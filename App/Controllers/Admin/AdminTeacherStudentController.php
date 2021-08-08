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

        $Exam->__set('examId', $_GET['id']);

        $this->view->examData = $Exam->list();

        $this->render('management/components/modalExam', 'SimpleLayout');
    }


    public function examUpdate()
    {

        $Exam = Container::getModel('TeacherStudent\\Exam');

        $Exam->__set('examId', $_POST['examId']);
        $Exam->__set('examDescription', $_POST['examDescription']);
        $Exam->__set('realizeDate', $_POST['realizeDate']);
        $Exam->__set('examValue', $_POST['examValue']);

        $Exam->update();
    }


    public function examDelete()
    {

        $Exam = Container::getModel('TeacherStudent\\Exam');
        $Exam->__set('examId', $_POST['examId']);
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

        if (!isset($_SESSION)) session_start();

        $Exam->__set("fk_id_class", $_GET['classId']);
        $Exam->__set("fk_id_teacher", isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listExam = $Exam->list();

        $this->render('management/components/examList', 'SimpleLayout');
    }


    public function recentsExam()
    {

        $Exam = Container::getModel('TeacherStudent\\Exam');

        $Exam->__set("fk_id_exam_unity", $_GET['unity']);
        $Exam->__set("fk_id_discipline_class", $_GET['disciplineClass']);

        $this->view->listExam = $Exam->recents();

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


    public function noteData()
    {

        $Note = Container::getModel('TeacherStudent\\Note');
        $Note->__set("noteId", $_GET['id']);

        $this->view->noteData = $Note->list();

        $this->render('student/components/modalNote', 'SimpleLayout');
    }


    public function noteListStudent()
    {

        $Note = Container::getModel('TeacherStudent\\Note');

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_student_enrollment', $_GET['enrollmentId']);
        $Note->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listNoteType = 'student';
        $this->view->listNote = $Note->list();

        $this->render('student/components/noteList', 'SimpleLayout');
    }


    public function noteListClass()
    {

        $Note = Container::getModel('TeacherStudent\\Note');

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_class', $_GET['classId']);
        $Note->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listNote = $Note->list();
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


    public function noteUpdate()
    {

        $Note = Container::getModel('TeacherStudent\\Note');

        $Note->__set("noteId", $_POST['noteId']);
        $Note->__set("noteValue", $_POST['noteValue']);

        $Note->update();
    }


    public function noteDelete()
    {

        $Note = Container::getModel('TeacherStudent\\Note');

        $Note->__set("noteId", $_POST['noteId']);

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

        if (!isset($_SESSION)) session_start();

        $Lack->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);
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

        $Lack->__set('lackId', $_GET['id']);

        $this->view->lackData = $Lack->list();

        $this->render('student/components/modalLack', 'SimpleLayout');
    }


    public function lackUpdate()
    {

        $Lack = Container::getModel('TeacherStudent\\Lack');

        $Lack->__set('lackId', $_POST['id']);
        $Lack->__set('totalLack', $_POST['totalLack']);

        $Lack->update();
    }


    public function lackSeek()
    {

        $Lack = Container::getModel('TeacherStudent\\Lack');

        if (!isset($_SESSION)) session_start();

        $Lack->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);
        $Lack->__set('fk_id_unity', $_GET['unity']);
        $Lack->__set('fk_id_discipline_class', $_GET['disciplineClass']);
        $Lack->__set('fk_id_enrollment', $_GET['enrollmentId']);

        $this->view->lackList = $Lack->seek($_GET['orderBy']);

        $this->render('student/components/lackList', 'SimpleLayout');
    }


    public function bulletin()
    {

        $StudentEnrollment = Container::getModel('Student\\StudentEnrollment');
        $Lack = Container::getModel('TeacherStudent\\Lack');
        $ClassDiscipline = Container::getModel('Admin\\ClassDiscipline');

        if (!isset($_SESSION)) session_start();

        $StudentEnrollment->__set('id', $_GET['enrollmentId']);
        $StudentEnrollment->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);
        $Lack->__set('fk_id_enrollment', $_GET['enrollmentId']);
        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);
        $ClassDiscipline->__set("fk_id_teacher", isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->bulletin = $StudentEnrollment->bulletin();
        $this->view->disciplinesClassAlreadyAdded = $ClassDiscipline->disciplinesClassAlreadyAdded();
        $this->view->lackList = $Lack->list();

        $this->render('student/components/bulletin', 'SimpleLayout');
    }


    public function disciplineFinalDataInsert()
    {

        $DisciplineAverage = Container::getModel('TeacherStudent\\DisciplineAverage');

        $DisciplineAverage->__set('fk_id_enrollment', $_POST['enrollmentId']);
        $DisciplineAverage->__set('fk_id_discipline_class', $_POST['disciplineClass']);
        $DisciplineAverage->__set('fk_id_subtitle', $_POST['subtitle']);
        $DisciplineAverage->__set('average', $_POST['average']);

        $DisciplineAverage->insert();
    }


    public function disciplineFinalData()
    {

        $DisciplineAverage = Container::getModel('TeacherStudent\\DisciplineAverage');

        $DisciplineAverage->__set('fk_id_enrollment', $_GET['enrollmentId']);
        $DisciplineAverage->__set('fk_id_discipline_class', $_GET['disciplineClass']);

        echo json_encode($DisciplineAverage->disciplineFinalData());
    }


    public function disciplineAverageList()
    {

        $DisciplineAverage = Container::getModel('TeacherStudent\\DisciplineAverage');
        $DisciplineAverage->__set('fk_id_enrollment', $_GET['enrollmentId']);

        $this->view->disciplineAverageList = $DisciplineAverage->list();
        $this->view->listSubtitles = $DisciplineAverage->availableSubtitles();

        $this->render('student/components/disciplineAverageList', 'SimpleLayout');
    }


    public function disciplineMediaAlreadyAdded()
    {

        $DisciplineAverage = Container::getModel('TeacherStudent\\DisciplineAverage');
        
        $DisciplineAverage->__set('fk_id_enrollment', $_GET['enrollmentId']);
        $DisciplineAverage->__set('fk_id_discipline_class', $_GET['disciplineClass']);

        echo json_encode($DisciplineAverage->disciplineMediaAlreadyAdded());

    }
}
