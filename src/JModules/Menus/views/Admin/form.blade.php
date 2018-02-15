<?php $input = "name"; ?>
            @include("parts.inputForm",["name"=>$input,"input"=>Form::text($input,@$row->$input,["class"=>"form-control removeArrow","required"=>"required"])])
<?php $input = "link"; ?>
            @include("parts.inputForm",["name"=>$input,"input"=>Form::text($input,@$row->$input,["class"=>"form-control removeArrow","required"=>"required"])])
<?php $input = "icon"; ?>
            @include("parts.inputForm",["name"=>$input,"input"=>Form::text($input,@$row->$input,["class"=>"form-control removeArrow","required"=>"required"])])
<?php $input = "parent_id"; ?>
            @include("parts.inputForm",["name"=>$input,"input"=>Form::Number($input,@$row->$input,["class"=>"form-control removeArrow"])])
<?php $input = "order"; ?>
            @include("parts.inputForm",["name"=>$input,"input"=>Form::Number($input,@$row->$input,["class"=>"form-control removeArrow"])])
