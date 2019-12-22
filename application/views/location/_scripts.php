<script type="text/javascript">

(function($) {


    'use strict';

    var responsiveHelper = undefined;
    var breakpointDefinition = {
        tablet: 1024,
        phone: 480
    };

    // Initialize datatable showing a search box at the top right corner
    var initTableWithSearch = function() {
        var table = $('#tableWithSearch');

        var settings = {
            "sDom": "<t><'row'<p i>>",
            "destroy": true,
            "scrollCollapse": true,
            "oLanguage": {
                "sLengthMenu": "_MENU_ ",
                "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
            },
            "iDisplayLength": 5
        };

        show_list();
        table.dataTable(settings);

        $('#show-modal').click(function() {
            $('#location-add').modal('show');
        });

        // search box for table
        $('#search-table').keyup(function() {
            table.fnFilter($(this).val());
        });
    }

    initTableWithSearch();

    function show_list(){
        $.ajax({
            type        : 'ajax',
            url         : '<?php echo site_url('location/data_list')?>',
            async       : true,
            dataType    : 'json',
            success     : function(data){
                var html = '';
                var i;
                var no = 1;
                for(i=0; i<data.length; i++){
                    if (data[i].is_deleted == 'n') {
                        data[i].is_deleted = 'NO';
                    } else {
                        data[i].is_deleted = '<strong style="color: red">YES</strong>';
                    }
                    html += '<tr>'+
                                '<td>'+no+'</td>'+
                                '<td>'+data[i].name+'</td>'+
                                '<td>'+data[i].address+'</td>'+
                                '<td>'+data[i].lat+'</td>'+
                                '<td>'+data[i].lng+'</td>'+
                                '<td>'+data[i].type+'</td>'+
                                '<td>'+data[i].is_deleted+'</td>'+
                                '<td style="text-align: right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item-edit" data-id="'+data[i].id+'" data-name="'+data[i].name+'" data-address="'+data[i].address+'" data-lat="'+data[i].lat+'" data-lng="'+data[i].lng+'" data-type="'+data[i].type+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Delete</a>'+
                                '</td>'+
                            '<tr>';
                            no++;
                }
                $('#show_data').html(html);
            }
        });
    } // show data

    $('#btn_save').on('click', function(){
        var name = $('#name').val();
        var address = $('#address').val();
        var lat = $('#lat').val();
        var lng = $('#lng').val();
        var type = $('#type').val();

        $.ajax({
            type        : "POST",
            url         : "<?php echo site_url('location/add')?>",
            dataType    : "JSON",
            data        : {name:name , address:address , lat:lat , lng:lng , type:type},
            success     : function(data){
                $('[name="name"]').val("");
                $('[name="address"]').val("");
                $('[name="lat"]').val("");
                $('[name="lng"]').val("");
                $('[name="type"]').val("");
                $('#location-add').modal('hide');
                show_list();
            }
        });
        return false;
    });

    $('#show_data').on('click','.item-edit',function(){
            var id      = $(this).data('id');
            var name        = $(this).data('name');
            var address      = $(this).data('address');
            var lat      = $(this).data('lat');
            var lng      = $(this).data('lng');
            var type      = $(this).data('type');
             
            $('#location-edit').modal('show');
            $('[name="id_edit"]').val(id);
            $('[name="name_edit"]').val(name);
            $('[name="address_edit"]').val(address);
            $('[name="lat_edit"]').val(lat);
            $('[name="lng_edit"]').val(lng);
            $('[name="type_edit"]').val(type);
    });

    $('#btn_save_edit').on('click',function(){
            var id      = $('#id_edit').val();
            var name    = $('#name_edit').val();
            var address   = $('#address_edit').val();
            var lat   = $('#lat_edit').val();
            var lng   = $('#lng_edit').val();
            var type   = $('#type_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('location/update')?>",
                dataType : "JSON",
                data : {id:id , name:name , address:address , lat:lat , lng:lng , type:type},
                success: function(data){
                    $('[name="id_edit"]').val("");
                    $('[name="name_edit"]').val("");
                    $('[name="address_edit"]').val("");
                    $('[name="lat_edit"]').val("");
                    $('[name="lng_edit"]').val("");
                    $('[name="type_edit"]').val("");
                    $('#location-edit').modal('hide');
                    show_list();
                }
            });
            return false;
    });

    $('#show_data').on('click','.item_delete',function(){
            var id = $(this).data('id');
            
            $('#location-delete').modal('show');
            $('[name="id_delete"]').val(id);
        });
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            var id = $('#id_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('location/delete')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id_delete"]').val("");
                    $('#location-delete').modal('hide');
                    show_list();
                }
            });
            return false;
        });
    

})(window.jQuery);
</script>
