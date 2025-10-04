<style type="text/css">


            .fc th {
                padding: 10px 0px;
                vertical-align: middle;
                background:#F2F2F2;
            }
            .fc-day-grid-event>.fc-content {
                padding: 4px;
            }
            #my-calendar {
                max-width: 900px;
            }
            .error {
                color: #ac2925;
                margin-bottom: 15px;
            }
            .event-tooltip {
                width:150px;
                background: rgba(0, 0, 0, 0.85);
                color:#FFF;
                padding:10px;
                position:absolute;
                z-index:10001;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 11px;

            }
            .modal-header
            {
                background-color: #3A87AD;
                color: #fff;
            }

</style>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left"><h3><i class="fa fa-ioxhost"></i> Manage Holidays</h3></div>
        </div>

        <div class="clearfix"></div>
        <div class="alert"></div>
        <div class="row">
            
			    <div class="col-md-12 col-sm-12 col-xs-12">
			  
                    <div class="x_panel">
                        <!--<div class="x_title">
                            <h2>Admin </h2>
                            <form action="<?php echo base_url('backend/add_attendance'); ?>" method="post" name="add_attendance" id="add_attendance">
                                <div class="col-md-5">
                                    <select name="admin_id" id="admin_id" class="form-control" required>
                                        <option value="">Select Admin</option>
                                        <?php if(!empty($admin_list)){ ?>
                                        <?php foreach($admin_list as $admin){ ?>
                                        <option value="<?php echo $admin->user_id; ?>" <?php if(!empty($admin_id)){ if($admin_id == $admin->user_id){ echo 'selected'; } } ?> ><?php echo $admin->name; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" name="submit" id="submit" value="Get Attendance">
                                </div>
                            </form>
        					
                            <div class="clearfix"></div>
                        </div>-->
                        <div class="x_content">
                            <div id='my-calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- /page content -->

<div class="modal fade" id="attendace-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="error"></div>
                <form class="form-horizontal" id="crud-form">
                <input type="hidden" id="start">
                <input type="hidden" id="end">

                <!--<div class="form-group">
                    <label class="col-md-2 control-label" for="title">To </label>
                    <div class="col-md-8">

                     <select    id="category" name="category" class="form-control" onchange="final_selection_category_div(this)">
                          <option value="">Select </option>
                         <option value="Employee">Employee</option>
                         <option value="Other">Other</option>

                      </select>
                           
                    </div>
                </div>  -->
                    <!--<div class="form-group" style="display:none" id="div_share_with">
                        <label class="col-md-2 control-label" for="title">ShareWith</label>
                        <div class="col-md-8">

                                 <select style="width: 372px; border:none;"   id="share_with" name="share_with[]" class="form-control js-example-tokenizer" multiple="multiple">


                               
                                <option value="Only Me">Only Me</option>
                                <option value="All">All</option>

                             <?php //$result = $this->db->get('user_admin')->result();
                                 if(!empty($result))
                                 { 
                                  foreach ($result as $row) {?>

                             <option value="<?php echo $row->user_admin_id; ?>"><?php echo $row->name.' '.$row->l_name; ?></option>     



                                         
                            <?php  } 
                                } ?>

                              </select>
                           
                        </div>
                    </div> --> 


                   <!-- <div class="form-group" style="display:none" id="div_other">
                        <label class="col-md-2 control-label" for="description">Email ID</label>
                        <div class="col-md-8">
                            <textarea class="form-control"  id="other_email_id" name="other_email_id" ></textarea>
                        </div>
                    </div>-->


                    <!--<div class="form-group">
                        <label class="col-md-2 control-label" for="title">Title</label>
                        <div class="col-md-8">

                            <input id="title" name="title"  type="text" class="form-control input-md" />
                        </div>
                    </div>  -->                          
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="description">Description</label>
                        <div class="col-md-8">
                            <textarea class="form-control"  id="description" name="description"></textarea>
                        </div>
                    </div>

                    
                    <!--<div class="form-group">
                        <label class="col-md-2 control-label" for="color">Color</label>
                        <div class="col-md-8">
                            <input id="color" name="color" type="text"  class="form-control input-md" readonly="readonly" />
                            <span class="help-block">Click to pick a color</span>
                        </div>
                    </div>-->
                </form>
            </div>
             
            <div class="modal-footer">
                <button type="button" class="effect effect-2 red" data-dismiss="modal">Cancel</button>
            </div>
            
        </div>
    </div>
</div>


<script>
$(function(){
    var currentDate; // Holds the day clicked when adding a new event
    var currentEvent; // Holds the event object when editing an event
    var employee_id = <?php echo $admin_id; ?>;
    
    /*$('#color').colorpicker();*/ // Colopicker
    var base_url='<?php echo base_url(); ?>'; // Here i define the base_url
    // Fullcalendar
    $('#my-calendar').fullCalendar({
        
        header: {
            left: 'prev, next, today',
            center: 'title',
             right: 'month, basicWeek, basicDay'
        },
        // Get all events stored in database
        eventLimit: true, // allow "more" link when too many events
        /*events: base_url+'backend/getAdminLeaveDetailsById',*/
        eventSources: [
            {
              url: base_url+'backend/getAdminHolidayDetailsById',
              method: 'POST',
              data: {
                employee_id: employee_id,
              },
              failure: function() {
                alert('there was an error while fetching events!');
              },
            }
         ],
        selectable: true,
        selectHelper: true,
        editable: true,      
        select: function(start, end) {
            $('#start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
            $('#end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
            modal({
                buttons: {
                    add: {
                        id: 'add-holiday-details', 
                        css: 'btn-success', 
                        label: 'Add' 
                    }
                },
                title: 'Add Holiday Details' 
            });
        }, 
           
        eventDrop: function(event, delta, revertFunc,start,end) {  
            
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }         
                       
               $.post(base_url+'calendar/dragUpdateEvent',{                            
                id:event.id,
                start : start,
                end :end
            }, function(result){
                $('.alert').addClass('alert-success').text('Event updated successfuly');
                hide_notify();


            });



          },
        eventResize: function(event,dayDelta,minuteDelta,revertFunc) { 
                    
                start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }         
                       
               $.post(base_url+'calendar/dragUpdateEvent',{                            
                id:event.id,
                start : start,
                end :end
            }, function(result){
                $('.alert').addClass('alert-success').text('Event updated successfuly');
                hide_notify();

            });
            },
        eventMouseover: function(calEvent, jsEvent, view){

            var tooltip = '<div class="event-tooltip">' + calEvent.description + '</div>';
            $("body").append(tooltip);

            $(this).mouseover(function(e) {
                $(this).css('z-index', 10000);
                $('.event-tooltip').fadeIn('500');
                $('.event-tooltip').fadeTo('10', 1.9);
            }).mousemove(function(e) {
                $('.event-tooltip').css('top', e.pageY + 10);
                $('.event-tooltip').css('left', e.pageX + 20);
            });
        },
        eventMouseout: function(calEvent, jsEvent) {
            $(this).css('z-index', 8);
            $('.event-tooltip').remove();
        },
        eventClick: function(calEvent, jsEvent, view) {
            
            currentEvent = calEvent;
            
            
            modal({
                
                buttons: {
                    delete: {
                        id: 'delete-event',
                        css: 'btn-danger',
                        label: 'Delete'
                    },
                    update: {
                        id: 'update-holiday-details',
                        css: 'btn-success',
                        label: 'Update'
                    }
                },
                /*title: 'Edit Event "' + calEvent.title + '"',*/
                title: 'Edit Event ',
                event: calEvent
            });
        }

    });
    
    
    function modal(data) {
        var employee_id = $('#admin_id').val();
        $('#employee_id').val(employee_id);
        $('#description').val('');
        $('.modal-title').html(data.title);
        $('.modal-footer button:not(".btn-default")').remove();
        if(data.event)
        {
            $('#description').val(data.event ? data.event.description : '');
            var event_added_by=data.event.event_added_by;
            /*if(user_id==event_added_by)
            {
                $('#category').val(data.event ? data.event.category : '');  
                $('#title').val(data.event ? data.event.title : '');  
                $('#event_added_by').val(data.event ? data.event.event_added_by : '');        
                $('#description').val(data.event ? data.event.description : '');
                $("#div_other").hide();  
                $("#div_share_with").show();   
                $('#share_with').val(data.event.share_with.split(',')).change();
                if(data.event.other_email)
                {
                    $("#div_share_with").hide();     
                    $("#div_other").show(); 
                    $('#other_email_id').val(data.event ? data.event.other_email : '');
                }
                $('#color').val(data.event ? data.event.color : '#3a87ad');
                $.each(data.buttons, function(index, button){
                    $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
                })
            }else if(data.event){
                $('#title').val(data.event ? data.event.title : '');  
                $('#title').prop('readonly', true);
                $('#description').val(data.event ? data.event.description : '');
                $('#description').prop('readonly', true);
                $('#share_with').val(data.event ? data.event.share_with : '');
                $('#share_with').prop('disabled', true);
                $('#color').val(data.event ? data.event.color : '#3a87ad');
                $('#color').prop('readonly', true);
            }*/
        }
        /*else 
        {
            $("#div_share_with").hide();  
            $("#div_other").hide(); 
            $('#category').val('');
            $('#title').val(data.event ? data.event.title : '');  
            $('#description').val(data.event ? data.event.description : '');
            $('#share_with').val(data.event ? data.event.share_with : '');
            $('#color').val(data.event ? data.event.color : '#3a87ad');
            
            $.each(data.buttons, function(index, button){
                $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
            })
        }*/
        $.each(data.buttons, function(index, button){
            $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
        })
        $('#attendace-modal').modal();
    }

    
    $('.modal').on('click', '#add-holiday-details',  function(e){
        if(validator(['description'])) { 
            $.post(base_url+'backend/addAdminHolidayDetails', { 
                employee_id: $('#employee_id').val(),
                description: $('#description').val(),
                start: $('#start').val(),
                end: $('#end').val()
            }, function(result){
                $('.alert').addClass('alert-success').text('Holiday Details added successfuly');
                $('.modal').modal('hide');
                $('#my-calendar').fullCalendar("refetchEvents");
                hide_notify();
            });
        }
    });


    
    $('.modal').on('click', '#update-holiday-details',  function(e){
        if(validator(['description'])) {
            $.post(base_url+'backend/updateAdminHolidayDetails', {
                id: currentEvent._id,
                description: $('#description').val(),
            }, function(result){
                $('.alert').addClass('alert-success').text('Event updated successfuly');
                $('.modal').modal('hide');
                $('#my-calendar').fullCalendar("refetchEvents");
                hide_notify();
                
            });
        }
    });



    
    $('.modal').on('click', '#delete-event',  function(e){
        $.get(base_url+'backend/deleteAdminHolidayDetails?id=' + currentEvent._id, function(result){
            $('.alert').addClass('alert-success').text('Event deleted successfully !');
            $('.modal').modal('hide');
            $('#my-calendar').fullCalendar("refetchEvents");
            hide_notify();
        });
    });

    function hide_notify()
    {
        setTimeout(function() {
                    $('.alert').removeClass('alert-success').text('');
                }, 2000);
    }


    
    function validator(elements) {
        var errors = 0;
        $.each(elements, function(index, element){
            if($.trim($('#' + element).val()) == '') errors++;
        });
        if(errors) {
            $('.error').html('Please add holiday details ') ;
            return false;
        }
        return true;
    }
    
});
</script>

		
		