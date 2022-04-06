<?php
class Controller_Students extends Controller_Template
{

    //Show list all student
	public function action_index()
	{
		// return Response::forge(View::forge('welcome/index'));
        if(Input::post('add')) {
            Response::redirect('/students/add');
        }
        $student = Model_Student::find('all');
        $data = array('students' => $student);
        $this->template->title = 'List Students';
        $this->template->content = View::forge('students/index',$data, false);
        // die('Posts index');
	}
    //Add student
    // public function action_add()
	// {
    //     if(Input::post('save')) {
    //         $student = new Model_Student();
    //         $student->name = Input::post('name');
    //         $student->age = Input::post('age');
    //         $student->save();
    //         Session::set_flash('success', 'Student Added');
    //         Response::redirect('/posts/index');
    //     }
	// 	$data = array();
    //     $this->template->title = 'Add Student';
    //     $this->template->content = View::forge('posts/add', $data, false);
	// }

    // //Edit student
    // public function action_edit($id)
	// {
    //     if(Input::post('save')) {
    //         $student = Model_Student::find(Input::post('student_id'));
    //         $student->name = Input::post('name');
    //         $student->age = Input::post('age');
    //         $student->save();
    //         Session::set_flash('success', 'Student Updated');
    //         Response::redirect('/posts/index');
    //     }
    //     $student = Model_Student::find('first', array(
    //         'where' => array(
    //             'id' => $id
    //         )
    //      ));
	// 	$data = array('student' => $student);
    //     $this->template->title = 'Edit Student';
    //     $this->template->content = View::forge('posts/edit', $data, false);
	// }

    //Change data student
    public function action_change($id=NULL) {
        if (isset($id)) {
            if(Input::post('save')) {
            $student = Model_Student::find(Input::post('student_id'));
            $student->name = Input::post('name');
            $student->age = Input::post('age');
            $student->save();
            Session::set_flash('success', 'Student Updated');
            Response::redirect('/students/index');
            }
        $student = Model_Student::find('first', array(
            'where' => array(
                'id' => $id
            )
         ));
		$data = array('student' => $student);
        $this->template->title = 'Edit Student';
        $this->template->content = View::forge('students/change', $data, false);
        }
        else {
            if(Input::post('save')) {
                $student = new Model_Student();
                $student->name = Input::post('name');
                $student->age = Input::post('age');
                $student->save();
                Session::set_flash('success', 'Student Added');
                Response::redirect('/students/index');
            }
            $data = array();
            $this->template->title = 'Add Student';
            $this->template->content = View::forge('students/change', $data, false);
        }
    }
    //Delete student
    public function action_delete($id)
	{
        $student = Model_Student::find($id);
        $student->delete();
        Session::set_flash('success', 'Student Deleted');
        Response::redirect('/students/index');
	}

    //View student by Id
    public function action_view($id)
	{
        $student = Model_Student::find($id);
		$data = array('student' => $student);
        $this->template->title = 'View Post';
        $this->template->content = View::forge('students/view', $data, false);
	}

}
 