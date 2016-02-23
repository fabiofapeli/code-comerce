<!-- Category Form Input -->
<div class="form-group">
{!! Form::label('category_id','Category:') !!}
{!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
</div>

<!-- Name Form Input -->
<div class="form-group">
    {!! Form::label('name','Name:') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}
</div>

<!-- Description Form Input -->
<div class="form-group">
    {!! Form::label('description','Description:') !!}
    {!! Form::textarea('description',null,['class'=>'form-control']) !!}
</div>

<!-- Price Form Input -->
<div class="form-group">
{!! Form::label('price','Price:') !!}
{!! Form::text('price',null,['class'=>'form-control']) !!}
</div>

<!-- Featured Form Input -->
<div class="form-group">
{!! Form::label('featured','Featured:') !!}
{!! Form::checkbox('featured',1) !!}
</div>

<!-- Recommend Form Input -->
<div class="form-group">
{!! Form::label('recommend','Recommend:') !!}
{!! Form::checkbox('recommend',1) !!}
</div>