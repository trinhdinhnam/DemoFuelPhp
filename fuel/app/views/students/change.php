<h2><?php echo isset($student->id) ? 'Update Student' : 'Add Student' ?></h2>
<?php echo Form::open(isset($student->id) ? '/students/change/<?php echo $student->id; ?>' : '/students/change'); ?>
<div class="student_name form-group" style="width: 80%; margin-left: 40px">
    <?php echo Form::label('Name', 'name'); ?>
    <?php echo Form::input('name', Input::post('name', isset($student) ? $student->name : ''), array('class' => 'form-control')); ?>
</div>
<div class="form-group" style="width: 80%; margin-left: 40px">
    <?php echo Form::label('Age', 'age'); ?>
    <?php echo Form::input('age', Input::post('age', isset($student) ? $student->age : ''), array('class' => 'form-control')); ?>
</div>
<div class="actions" style="width: 80%; margin-left: 40px">
    <?php echo Form::submit('save'); ?>
</div>
<input type="hidden" name="student_id" value="<?php echo isset($student->id) ? $student->id : '' ?>">
<?php echo Form::close(); ?>