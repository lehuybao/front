
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('front::front.front_category_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_front_category','method' => 'get']) !!}

        <!--TITLE-->
		<div class="form-group">
            {!! Form::label('front_category_name',trans('front::front.front_category_name_label')) !!}
            {!! Form::text('front_category_name', @$params['front_category_name'], ['class' => 'form-control', 'placeholder' => trans('front::front.front_category_name')]) !!}
        </div>

        {!! Form::submit(trans('front::front.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>




