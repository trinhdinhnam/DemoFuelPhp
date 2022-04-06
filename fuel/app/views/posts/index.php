<?php if(Session::get_flash('success')) :  ?>
    <div class="alert alert-success"><?php echo Session::get_flash('success'); ?></div>
 <?php endif; ?>
 <?php if(Session::get_flash('error')) :  ?>
    <div class="alert alert-danger"><?php echo Session::get_flash('error'); ?></div>
 <?php endif; ?>
 
<div class="header"><h2>Danh sách các Sinh viên</h2></div>
<?php echo Form::open('/posts/index'); ?>
<div class="actions">
    <a href="<?=Router::get('student.add')?>" class="btn btn-primary">Thêm mới</a>
</div>
<?php echo Form::close(); ?>
 <table class="table">
  <thead>
      <tr>
          <th>ID</th>
          <th>Tên sinh viên</th>
          <th>Tuổi</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
      <?php foreach($students as $student) : ?>
         <tr>
             <td><?php echo $student->id; ?></td>
             <td><?php echo $student->name; ?></td>
             <td><?php echo $student->age; ?></td>
             <td>
              <a href="<?=Router::get('student.view', [$student->id])?>" class="btn btn-success">View</a>
              <a href="<?=Router::get('student.edit', [$student->id])?>" class="btn btn-warning">Edit</a>
              <a href="<?=Router::get('student.delete', [$student->id])?>" class="btn btn-danger">Delete</a>
             </td>
         </tr>
      <?php endforeach; ?>
  </tbody>
 </table>
