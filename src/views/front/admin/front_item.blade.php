
@if( ! $fronts->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('front::front.order') }}</td>
            <th style='width:10%'></th>
            <th style='width:50%'>Tên Front</th>
            <th style='width:20%'>{{ trans('front::front.operations') }}</th>
        </tr>
    </thead>
    <tbody>
      
        @foreach($fronts as $front)
        <tr>
            <td>
              
            </td>
            <td>{!! $front->front_id !!}</td>
            <td>{!! $front->front_name !!}</td>
            <td>
                <a href="{!! URL::route('admin_front.edit', ['id' => $front->front_id]) !!}"><i class="fa fa-edit fa-2x"></i></a>
                <a href="{!! URL::route('admin_front.delete',['id' =>  $front->front_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
 <span class="text-warning">
	<h5>
		{{ trans('front::front.message_find_failed') }}
	</h5>
 </span>
@endif
<div class="paginator">
    {!! $fronts->appends($request->except(['front']) )->render() !!}
</div>