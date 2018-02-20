<?php $input = "title"; ?>
@include("parts.inputForm",["name"=>$input,"input"=>Form::text($input,@$row->$input,["class"=>"form-control removeArrow","required"=>"required"])])
<?php $input = "content"; ?>
@include("parts.inputForm",["name"=>$input,"input"=>Form::textarea($input,@$row->$input,["class"=>"form-control removeArrow richtext","required"=>"required"])])
<?php $input = "status"; ?>
@include("parts.inputForm",["name"=>$input,"input"=>Form::number($input,@$row->$input,["class"=>"form-control removeArrow","required"=>"required"])])
<?php $input = "meta"; ?>
@include("parts.inputForm",["name"=>$input,"input"=>Form::text($input,@$row->$input,["class"=>"form-control removeArrow"])])
<?php $input = "slug"; ?>
@include("parts.inputForm",["name"=>$input,"input"=>Form::text($input,@$row->$input,["class"=>"form-control removeArrow"])])
<?php $input = "template_id"; ?>
@include("parts.inputForm",["name"=>$input,"input"=>Form::select($input,array_merge([0=>'No Select'],@$template),$row->$input,["class"=>"form-control removeArrow","required"=>"required"])])
<?php $input = "publish_date"; ?>
@include("parts.inputForm",["name"=>$input,"input"=>Form::date($input,@$row->$input,["class"=>"form-control removeArrow","required"=>"required"])])
<?php $input = "css"; ?>
@include("parts.inputForm",["name"=>$input,"input"=>Form::textarea($input,@$row->$input,["class"=>"form-control removeArrow richtext"])])
<?php $input = "js"; ?>
@include("parts.inputForm",["name"=>$input,"input"=>Form::textarea($input,@$row->$input,["class"=>"form-control removeArrow richtext"])])
