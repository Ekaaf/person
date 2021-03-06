$(document).ready( function () {
    $("form[name='person_form']").validate({
        // Specify validation rules
        rules: {
            name: "required",
            country_id: {
                required: true,
                number: true
            },
            city_id: {
                required: true,
                number: true
            },
            'lang_skills_id[]': {
                required: true,
            },
            dob: {
                required: true,
                date: true
            },
            resume_file: {
                required: function(element){
                    if($('#id').length > 0){
                        return false;
                    }
                    else{
                        return true;   
                    }
                },
                accept: "doc, pdf"
            }
        },
        // Specify validation error messages
        messages: {
          name: "Please insert name",
          country_id : "Please Select Country",  
          city_id : "Please Select City",      
          'lang_skills_id[]' : "Please Select atleast one language",  
          dob : "Please give your Date of Birth",  
          resume_file : "Please upload your file in doc or pdf format",  
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            if(element.get(0).type == 'checkbox') {
                error.insertAfter($("#checkboxDiv"));
            }
            else{
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
          form.submit();
        }
    });
    setTimeout(function(){
        if ($('#success_div').length > 0) {
            $('#success_div').hide();
           }
        }, 5000)
    getPersons();
});
function getPersons(){
    $('#person_table').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 10,
        pagingType: "full_numbers",
        language: {
            processing: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
        },
        destroy: true,
        autoWidth: false,
        searching: false,
        ajax: {
            url: "get_persons",
            type: 'GET',
        },
        "columnDefs": [
            { "orderable": false, "targets": 0 },
            { "orderable": false, "targets": 4 },
            { "orderable": false, "targets": 7 }
        ],
        columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex',searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'country_name', name: 'countries.name' },
                    { data: 'city_name', name: 'cities.name' },
                    { data: 'languages', name: 'lang_skills.language' },
                    { data: 'resume_filename',
                        "render": function ( data, type, full, meta ) {
                            return '<a href="'+full['resume_filepath']+'" download="" class="ml-2">'+data+' <i class="fa fa-download" aria-hidden="true"></i></a>';
                        }
                    },
                    { data: 'dob', name: 'dob' },
                    { data: 'id',
                        "render": function ( data, type, full, meta ) {
                            return '<a href="view/'+data+'"><i class="fas fa-2x fa-eye mr-1"></i></a>'+
                                   '<a href="edit/'+data+'"><i class="fas fa-2x fa-pen-square mr-1"></i></a>'+
                                   '<a href="javascript:void(0);" onclick="deletePerson('+data+');"><i class="fas fa-2x fa-window-close"></i></a>';
                        }
                    },
                ],
        order: [[6, 'desc']]
    });
}


function getCitiesByCountry(city_id =""){
    var country_id = $("#country_id").val();
    $.ajax({
        url: "/get_cities_by_country",
        type: 'GET',
        data: {
            country_id : country_id
        },
        dataType: 'json'
    })
    .done(function (data){
        $("#city_id").empty();
        $("#city_id").append('<option value="">Select City</option>')
        $.each(data, function(index, item) {
            if(item.id == city_id){
                $("#city_id").append('<option value="'+item.id+'" selected>'+item.name+'</option>');  
            }
            else{
                $("#city_id").append('<option value="'+item.id+'">'+item.name+'</option>');   
            }
        });
    });   
}

function deletePerson(id){
    var txt;
    var r = confirm("Are you sure want to delete ?");
    if (r == true) {
         $.ajax({
            url: "person-delete/"+id,
            type: 'get',
            dataType: 'text',
            crossDomain: true,
        })
        .done(function (data) {
            getPersons();
            alert(data);
        });
    }
}