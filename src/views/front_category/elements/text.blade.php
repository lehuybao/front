<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $front_category_name = $request->get('front_titlename') ? $request->get('front_name') : @$front->front_category_name ?>
    {!! Form::label($name, trans('front::front.name').':') !!}
    {!! Form::text($name, $front_category_name, ['class' => 'form-control', 'placeholder' => trans('front::front.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->