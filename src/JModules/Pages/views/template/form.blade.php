<?php $input = "title"; ?>
@include("parts.inputForm",["name"=>$input,"input"=>Form::text($input,@$row->$input,["class"=>"form-control removeArrow","required"=>"required"])])
<?php $input = "content"; ?>
@include("parts.inputForm",["name"=>$input,"input"=>Form::textarea($input,@$row->$input,["class"=>"form-control removeArrow","required"=>"required"])])