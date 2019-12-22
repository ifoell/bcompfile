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
            $('#services-add').modal('show');
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
            url         : '<?php echo site_url('services/data_list')?>',
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
                                '<td>'+data[i].detail+'</td>'+
                                '<td>'+data[i].icon+'</td>'+
                                '<td>'+data[i].is_deleted+'</td>'+
                                '<td style="text-align: right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item-edit" data-id="'+data[i].id+'" data-name="'+data[i].name+'" data-detail="'+data[i].detail+'" data-icon="'+data[i].icon+'">Edit</a>'+' '+
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
        var detail = $('#detail').val();
        var icon = $('#icon').val();

        $.ajax({
            type        : "POST",
            url         : "<?php echo site_url('services/add')?>",
            dataType    : "JSON",
            data        : {name:name , detail:detail , icon:icon},
            success     : function(data){
                $('[name="name"]').val("");
                $('[name="detail"]').val("");
                $('[name="icon"]').val("");
                $('#services-add').modal('hide');
                show_list();
            }
        });
        return false;
    });

    $('#show_data').on('click','.item-edit',function(){
            var id      = $(this).data('id');
            var name        = $(this).data('name');
            var detail      = $(this).data('detail');
            var icon      = $(this).data('icon');
             
            $('#services-edit').modal('show');
            $('[name="id_edit"]').val(id);
            $('[name="name_edit"]').val(name);
            $('[name="detail_edit"]').val(detail);
            $('[name="icon_edit"]').val(icon);
    });

    $('#btn_save_edit').on('click',function(){
            var id      = $('#id_edit').val();
            var name    = $('#name_edit').val();
            var detail   = $('#detail_edit').val();
            var icon   = $('#icon_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('services/update')?>",
                dataType : "JSON",
                data : {id:id , name:name , detail:detail},
                success: function(data){
                    $('[name="id_edit"]').val("");
                    $('[name="name_edit"]').val("");
                    $('[name="detail_edit"]').val("");
                    $('[name="icon_edit"]').val("");
                    $('#services-edit').modal('hide');
                    show_list();
                }
            });
            return false;
    });

    $('#show_data').on('click','.item_delete',function(){
            var id = $(this).data('id');
            
            $('#services-delete').modal('show');
            $('[name="id_delete"]').val(id);
        });
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            var id = $('#id_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('services/delete')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id_delete"]').val("");
                    $('#services-delete').modal('hide');
                    show_list();
                }
            });
            return false;
        });
    

})(window.jQuery);
</script>
