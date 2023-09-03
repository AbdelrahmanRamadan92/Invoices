@if (session()->has('add'))
<script>
    window.onload = function() {
        notif({
            msg: "تم اضافة القسم بنجاح",
            type: "success"
        })
    }
</script>
@endif
@if (session()->has('update'))
<script>
    window.onload = function() {
        notif({
            msg: "تم تعديل القسم بنجاح",
            type: "success"
        })
    }
</script>
@endif
@if (session()->has('delete'))
<script>
    window.onload = function() {
        notif({
            msg: "تم حذف القسم بنجاح",
            type: "success"
        })
    }
</script>
@endif
{{-- manual method validation
@if (session()->has('errors'))
  <div class="alert alert-danger alert-dismissible fade show"  role="alert">
      <strong>{{session()->get('errors')}}</strong><br>
      <button type="button" class="close " data-dismiss="alert" aria-label="close">
           <span aria-hidden="true">&times;</span>
      </button>
  </div>
    
@endif
--}}
@if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show"  role="alert">
      <ul>
          @foreach ($errors->all() as $error)
          <li><strong>{{ $error }}</strong></li>
          @endforeach
      </ul>
      <button type="button" class="close " data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
       </button>
   </div>
@endif