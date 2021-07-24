<?php

namespace App\Controllers\Admin;

use MF\Controller\Action;
use MF\Model\Container;

class AdminTeacherStudentController extends Action
{

    public function examInsert()
    {

        $Exam = Container::getModel('TeacherStudent\\Exam');

        $Exam->__set("examDescription", $_POST['examDescription']);
        $Exam->__set("examValue", $_POST['examValue']);
        $Exam->__set("realizeDate", $_POST['realizeDate']);
        $Exam->__set("fk_id_exam_unity", $_POST['unity']);
        $Exam->__set("fk_id_discipline_class", $_POST['disciplineClass']);

        $Exam->insert();
    }


    public function sumUnitGrades()
    {

        $Exam = Container::getModel('TeacherStudent\\Exam');

        $Exam->__set("fk_id_exam_unity", $_GET['unity']);
        $Exam->__set("fk_id_discipline_class", $_GET['disciplineClass']);

        echo json_encode($Exam->sumUnitGrades());
    }


    public function examData()
    {

        $Exam = Container::getModel('TeacherStudent\\Exam');

        $Exam->__set('id', $_GET['id']);

        $this->view->examData = $Exam->examList("WHERE avaliacoes.id_avaliacao = " . $Exam->__get('examId'));

        $this->render('management/components/modalExam', 'SimpleLayout');
    }


    public function examUpdate()
    {

        $Exam = Container::getModel('TeacherStudent\\Exam');

        $Exam->__set('id', $_POST['examId']);
        $Exam->__set('examDescription', $_POST['examDescription']);
        $Exam->__set('realizeDate', $_POST['realizeDate']);
        $Exam->__set('examValue', $_POST['examValue']);

        $Exam->update();
    }


    public function examDelete()
    {

        $Exam = Container::getModel('TeacherStudent\\Exam');
        $Exam->__set('id', $_POST['examId']);
        $Exam->delete();
    }


    public function examSeek()
    {

        $Exam = Container::getModel('TeacherStudent\\Exam');

        $Exam->__set("fk_id_exam_unity", $_GET['unity']);
        $Exam->__set("fk_id_discipline_class", $_GET['disciplineClass']);
        $Exam->__set("examDescription", $_GET['examDescription']);
        $Exam->__set("fk_id_class", $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $Exam->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listExam = $Exam->seek();

        $this->render('management/components/examList', 'SimpleLayout');
    }


    public function checkExamName()
    {

        $Exam = Container::getModel('TeacherStudent\\Exam');

        $Exam->__set("fk_id_exam_unity", $_GET['unity']);
        $Exam->__set("fk_id_discipline_class", $_GET['disciplineClass']);
        $Exam->__set("examDescription", $_GET['examDescription']);

        echo json_encode($Exam->checkName());
    }


    public function examList()
    {

        $Exam = Container::getModel('TeacherStudent\\Exam');

        $Exam->__set("fk_id_class", $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $teacher_id = isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0;

        $this->view->listExam = $Exam->examList("WHERE turma_disciplina.fk_id_turma = " . $Exam->__get('fk_id_class') . " AND CASE WHEN $teacher_id = 0 THEN turma_disciplina.fk_id_professor <> 0 ELSE turma_disciplina.fk_id_professor = $teacher_id END");

        $this->render('management/components/examList', 'SimpleLayout');
    }


    public function recentsExam()
    {

        $Exam = Container::getModel('TeacherStudent\\Exam');

        $Exam->__set("fk_id_exam_unity", $_GET['unity']);
        $Exam->__set("fk_id_discipline_class", $_GET['disciplineClass']);

        $this->view->listExam = $Exam->examList("WHERE avaliacoes.fk_id_unidade_avaliacao = " . $Exam->__get('fk_id_exam_unity') . " AND avaliacoes.fk_id_turma_disciplina_avaliacao = " . $Exam->__get('fk_id_discipline_class'));

        $this->view->typeListExam = 'recent';

        $this->render('management/components/examList', 'SimpleLayout');
    }


    public function insertExamNote()
    {

        $Note = Container::getModel('TeacherStudent\\Note');

        $Note->__set("fk_id_student_enrollment", $_POST['enrollmentId']);
        $Note->__set("noteValue", $_POST['noteValue']);
        $Note->__set("fk_id_exam", $_POST['examDescription']);

        $Note->insert();
    }


    public function notesNotAddedYet()
    {

        $Note = Container::getModel('TeacherStudent\\Note');

        $Note->__set('fk_id_student_enrollment', $_GET['enrollmentId']);
        $Note->__set('fk_id_class', $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        echo json_encode($Note->notesNotAddedYet());
    }


    public function noteListStudent()
    {

        $Note = Container::getModel('TeacherStudent\\Note');

        $Note->__set('fk_id_student_enrollment', $_GET['enrollmentId']);

        $this->view->listNoteType = 'student';

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listNote = $Note->list("WHERE nota_avaliacao.fk_id_matricula_aluno = " . $Note->__get('fk_id_student_enrollment'));

        $this->render('student/components/noteList', 'SimpleLayout');
    }


    public function noteListClass()
    {

        $Note = Container::getModel('TeacherStudent\\Note');

        $Note->__set('fk_id_class', $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listNote = $Note->list("WHERE turma_disciplina.fk_id_turma = " . $Note->__get('fk_id_class'));
        $this->view->listNoteType = 'class';

        $this->render('student/components/noteList', 'SimpleLayout');
    }


    public function noteSeek()
    {

        $Note = Container::getModel('TeacherStudent\\Note');

        $Note->__set("fk_id_exam_unity", $_GET['unity']);
        $Note->__set("fk_id_discipline_class", $_GET['disciplineClass']);
        $Note->__set("examDescription", $_GET['examDescription']);
        $Note->__set("fk_id_student_enrollment", $_GET['enrollmentId']);
        $Note->__set("fk_id_class", $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listNoteType = 'student';

        $this->view->listNote = $Note->seek();

        $this->render('student/components/noteList', 'SimpleLayout');
    }


    public function noteSeekClass()
    {

        $Note = Container::getModel('TeacherStudent\\Note');

        $Note->__set("fk_id_exam_unity", $_GET['unity']);
        $Note->__set("fk_id_discipline_class", $_GET['disciplineClass']);
        $Note->__set("examDescription", $_GET['examDescription']);
        $Note->__set("fk_id_student_enrollment", 0);
        $Note->__set("fk_id_class", $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listNote = $Note->seek($_GET['orderBy']);

        $this->view->listNoteType = 'class';

        $this->render('student/components/noteList', 'SimpleLayout');
    }


    public function noteData()
    {

        $Note = Container::getModel('TeacherStudent\\Note');
        $Note->__set("id", $_GET['id']);

        $this->view->noteData = $Note->list("WHERE nota_avaliacao.id_nota = " . $Note->__get('noteId'));

        $this->render('student/components/modalNote', 'SimpleLayout');
    }


    public function noteUpdate()
    {

        $Note = Container::getModel('TeacherStudent\\Note');

        $Note->__set("id", $_POST['noteId']);
        $Note->__set("noteValue", $_POST['noteValue']);

        $Note->update();
    }


    public function noteDelete()
    {

        $Note = Container::getModel('TeacherStudent\\Note');

        $Note->__set("id", $_POST['noteId']);

        $Note->delete();
    }

    public function observationInsert()
    {

        $Observation = Container::getModel('TeacherStudent\\Observation');

        $Observation->__set('observationDescription', $_POST['description']);
        $Observation->__set('fk_id_discipline_class', $_POST['disciplineClass']);
        $Observation->__set('fk_id_enrollment', $_POST['enrollmentId']);
        $Observation->__set('fk_id_unity', $_POST['unity']);

        $Observation->insert();
    }


    public function observationList()
    {

        $Observation = Container::getModel('TeacherStudent\\Observation');

        if (!isset($_SESSION)) session_start();

        $Observation->__set('fk_id_enrollment', $_GET['enrollmentId']);
        $Observation->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listObservation = $Observation->list();

        $this->render("student/components/observationList", "SimpleLayout");
    }


    public function observationUpdate()
    {

        $Observation = Container::getModel('TeacherStudent\\Observation');

        $Observation->__set('id', $_POST['id']);
        $Observation->__set('observationDescription', $_POST['description']);

        $Observation->update();
    }


    public function observationDelete()
    {

        $Observation = Container::getModel('TeacherStudent\\Observation');

        $Observation->__set('id', $_POST['id']);

        $Observation->delete();
    }


    public function lackInsert()
    {

        $Lack = Container::getModel('TeacherStudent\\Lack');

        $Lack->__set('totalLack', $_POST['totalLack']);
        $Lack->__set('fk_id_unity', $_POST['unity']);
        $Lack->__set('fk_id_discipline_class', $_POST['disciplineClass']);
        $Lack->__set('fk_id_enrollment', $_POST['enrollmentId']);

        $Lack->insert();
    }


    public function lackList()
    {

        $Lack = Container::getModel('TeacherStudent\\Lack');

        $Lack->__set('fk_id_enrollment', $_GET['enrollmentId']);

        $this->view->lackList = $Lack->list();

        $this->render('student/components/lackList', 'SimpleLayout');
    }


    public function lackAvailable()
    {

        $Lack = Container::getModel('TeacherStudent\\Lack');

        $Lack->__set('fk_id_enrollment', $_GET['enrollmentId']);
        $Lack->__set('fk_id_unity', $_GET['unity']);
        $Lack->__set('fk_id_discipline_class', $_GET['disciplineClass']);

        echo json_encode($Lack->lackAvailable());
    }


    public function lackData()
    {

        $Lack = Container::getModel('TeacherStudent\\Lack');

        $Lack->__set('id', $_GET['id']);
        $Lack->__set('fk_id_enrollment', 0);

        $this->view->lackData = $Lack->list();

        $this->render('student/components/modalLack', 'SimpleLayout');
    }
}
