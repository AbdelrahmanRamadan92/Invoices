					<!-- Basic modal -->
                    <div class="modal" id="add">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content modal-content-demo">
                              <div class="modal-header">
                                 <h6 class="modal-title">إضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                             </div>
                               {{-- form --}}
                             <form method="POST" action="{{url('sections')}}"> 
                                  {{--'another way to write action action='{{route("sections.store")}}' --}}
                                 @csrf
                                 <div class="modal-body">
                                     <div class="form-group">
                                         <label for="exampleInputEmail1">اسم القسم</label>
                                         <input type="text" name="section_name" class="form-control" id="section_name" aria-describedby="emailHelp" placeholder="من فضلك ادخل اسم القسم">
                                       </div>
                                     
                                       <div class="form-group">
                                         <label for="exampleInputPassword1">الوصف</label>
                                         <textarea name="description" id="description" class="form-control"></textarea>
                                       </div>
 
                                 </div>
                                 <div class="modal-footer">
                                      <button type="submit" class="btn btn-success" type="button">تأكيد الاضافة</button>
                                     <button class="btn btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                                 </div>
                             </form>	
                              {{-- end form --}}
                         </div>
                     </div>
                </div>
                 <!-- End Basic modal -->
