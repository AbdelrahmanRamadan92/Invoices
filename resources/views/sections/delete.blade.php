<!-- delete modal -->
<div class="modal" id="delete{{$section->id}}">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">حذف القسم</h6>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('sections.destroy',$section->id)}}" method="post">
				{{ method_field('delete') }}
				{{ csrf_field() }}
				<div class="modal-body">
					<p>هل انت متاكد من عملية الحذف ؟</p><br>
					<input type="hidden" name="id" id="id" value="{{$section->id}}">
					<input class="form-control" name="section_name" id="section_name" value="{{$section->section_name}}" type="text" readonly>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
					<button type="submit" class="btn btn-danger">تاكيد</button>
				</div>
		</div>
		</form>
	</div>
</div>
<!-- end delete modal -->