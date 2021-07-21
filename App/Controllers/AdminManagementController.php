<?php

namespace App\Controllers;

use App\Models\Student\Student;
use App\Models\Teacher\Teacher;
use MF\Controller\Action;
use MF\Model\Container;

class AdminManagementController extends Action
{

    public function managementGeneral()
    {
        $this->render('management/pages/generalManagement', 'AdminLayout');
    }


    // School Term


    public function schoolTermManagement()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');

        $this->view->listSchoolTerm = $SchoolTerm->list();
        $this->view->listSchoolTermStates = $SchoolTerm->listSchoolTermStates();

        $this->render('management/pages/schoolTermManagement', 'AdminLayout');
    }


    public function schoolTermInsert()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');

        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituationAdd']);
        $SchoolTerm->__set('fk_id_school_year', $_POST['schoolYear']);

        $SchoolTerm->insert();
    }


    public function schoolTermUpdate()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');

        $SchoolTerm->__set('schoolTermId', $_POST['schoolTermId']);
        $SchoolTerm->__set('startDate', $_POST['startDate']);
        $SchoolTerm->__set('endDate', $_POST['endDate']);
        $SchoolTerm->__set('fk_id_school_term_situation', $_POST['schoolTermSituation']);

        $SchoolTerm->update();
    }


    public function schoolTermList()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');

        $this->view->listSchoolTerm = $SchoolTerm->list();
        $this->view->listSchoolTermStates = $SchoolTerm->listSchoolTermStates();

        $this->render('management/components/schoolTermsList', 'SimpleLayout');
    }


    public function schoolTermDelete()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');
        $SchoolTerm->__set('schoolTermId', $_POST['schoolTermId']);
        $SchoolTerm->delete();
    }


    public function schoolTermAvailable()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');
        echo json_encode($SchoolTerm->listAvailableYears());
    }


    public function schoolTermActive()
    {

        $SchoolTerm = Container::getModel('Management\\SchoolTerm');
        echo json_encode($SchoolTerm->active());
    }


    // Class Room ( Sala de Aula )


    public function ClassRoomManagement()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');

        $this->view->listClassRoom = $ClassRoom->list();

        $this->render('management/pages/classroomManagement', 'AdminLayout');
    }


    public function classRoomInsert()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');

        $ClassRoom->__set('studentCapacity', $_POST['studentCapacity']);
        $ClassRoom->__set('fk_id_classroom_number', $_POST['classroomNumber']);

        $ClassRoom->insert();
    }


    public function classRoomUpdate()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');

        $ClassRoom->__set('classroomId', $_POST['classroomId']);
        $ClassRoom->__set('studentCapacity', $_POST['studentCapacity']);

        $ClassRoom->update();
    }


    public function availableRoomNumbers()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');
        echo json_encode($ClassRoom->availableNumbers());
    }


    public function classRoomList()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');

        $this->view->listClassRoom = $ClassRoom->list();

        $this->render('management/components/classroomsList', 'SimpleLayout');
    }


    public function classRoomDelete()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');
        $ClassRoom->__set('classroomId', $_POST['classroomId']);
        $ClassRoom->delete();
    }


    public function classRoomActive()
    {

        $ClassRoom = Container::getModel('Management\\ClassRoom');
        echo json_encode($ClassRoom->activeClassRoom());
    }



    // Course


    public function courseManagement()
    {

        $Course = Container::getModel('Management\\Course');

        $this->view->listCourse = $Course->list();

        $this->render('management/pages/courseManagement', 'AdminLayout');
    }


    public function courseInsert()
    {

        $Course = Container::getModel('Management\\Course');

        $Course->__set('courseName', $_POST['courseName']);
        $Course->__set('acronym', $_POST['acronym']);

        $Course->insert();
    }


    public function courseList()
    {

        $Course = Container::getModel('Management\\Course');

        $this->view->listCourse = $Course->list();

        $this->render('management/components/coursesList', 'SimpleLayout');
    }


    public function courseUpdate()
    {

        $Course = Container::getModel('Management\\Course');

        $Course->__set('courseId', $_POST['courseId']);
        $Course->__set('courseName', $_POST['courseName']);
        $Course->__set('acronym', $_POST['acronym']);

        $Course->update();
    }


    public function courseAvailable()
    {

        $Course = Container::getModel('Management\\Course');
        echo json_encode($Course->availableCourse());
    }


    public function courseDelete()
    {

        $Course = Container::getModel('Management\\Course');

        $Course->__set('courseId', $_POST['courseId']);

        $Course->delete();
    }


    // Discipline


    public function disciplineManagement()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $this->view->listDiscipline = $Discipline->list();
        $this->view->listModality = $Discipline->listDisciplineModality();

        $this->render('management/pages/disciplineManagement', 'AdminLayout');
    }


    public function disciplineInsert()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $Discipline->__set('disciplineName', $_POST['disciplineName']);
        $Discipline->__set('acronym', $_POST['acronym']);
        $Discipline->__set('fk_id_modality', $_POST['modalityAdd']);

        $Discipline->insert();
    }


    public function disciplineList()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $this->view->listDiscipline = $Discipline->list();

        $this->render('management/components/disciplinesList', 'SimpleLayout');
    }


    public function disciplineUpdate()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $Discipline->__set('disciplineId', $_POST['disciplineId']);
        $Discipline->__set('disciplineName', $_POST['disciplineName']);
        $Discipline->__set('acronym', $_POST['acronym']);
        $Discipline->__set('fk_id_modality', $_POST['modality']);

        $Discipline->update();
    }


    public function disciplineSeek()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $Discipline->__set('disciplineName', $_GET['seekName']);
        $Discipline->__set('fk_id_modality', $_GET['seekModality']);

        $this->view->listDiscipline = $Discipline->seekDiscipline();

        $this->render('management/components/disciplinesList', 'SimpleLayout');
    }


    public function disciplineData()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $Discipline->__set('disciplineId', $_GET['id']);

        $this->view->discipline = $Discipline->disciplineData();
        $this->view->listDisciplineModality = $Discipline->listDisciplineModality();

        $this->render('management/components/disciplineModal', 'SimpleLayout');
    }


    public function disciplineDelete()
    {

        $Discipline = Container::getModel('Management\\Discipline');

        $Discipline->__set('disciplineId', $_POST['disciplineId']);

        $Discipline->delete();
    }


    // Class


    public function classManagement()
    {

        $Classe = Container::getModel('Management\\Classe');
        $Course = Container::getModel('Management\\Course');
        $ClassRoom = Container::getModel('Management\\ClassRoom');
        $SchoolTerm = Container::getModel('Management\\SchoolTerm');

        $this->view->listClass = $Classe->list();
        $this->view->availableShift = $Classe->availableShift();
        $this->view->availableBallot = $Classe->availableBallot();
        $this->view->availableSeries = $Classe->availableSeries();
        $this->view->availableCourse = $Course->availableCourse();
        $this->view->availableClassRoom = $ClassRoom->activeClassroom();
        $this->view->activeSchoolTerm = $SchoolTerm->active();

        $this->render('management/pages/classeManagement', 'AdminLayout');
    }


    public function classInsert()
    {

        $Class = Container::getModel('Management\\Classe');

        $Class->__set('fk_id_ballot', $_POST['ballot']);
        $Class->__set('fk_id_classroom', $_POST['classRoom']);
        $Class->__set('fk_id_school_term', $_POST['schoolTerm']);
        $Class->__set('fk_id_course', $_POST['course']);
        $Class->__set('fk_id_shift', $_POST['shift']);
        $Class->__set('fk_id_series', $_POST['series']);

        $Class->insert();
    }


    public function classCheck()
    {

        $Classe = Container::getModel('Management\\Classe');

        $Classe->__set('fk_id_ballot', $_GET['ballot']);
        $Classe->__set('fk_id_classroom', $_GET['classRoom']);
        $Classe->__set('fk_id_school_term', $_GET['schoolTerm']);
        $Classe->__set('fk_id_course', $_GET['course']);
        $Classe->__set('fk_id_shift', $_GET['shift']);
        $Classe->__set('fk_id_series', $_GET['series']);

        echo json_encode($Classe->checkClass());
    }


    public function classList()
    {

        $Classe = Container::getModel('Management\\Classe');

        $this->view->listClass = $Classe->list();

        $this->render('management/components/classList', 'SimpleLayout');
    }


    public function classSeek()
    {

        $Classe = Container::getModel('Management\\Classe');

        $Classe->__set('fk_id_course', $_GET['course']);
        $Classe->__set('fk_id_shift', $_GET['shift']);
        $Classe->__set('fk_id_series', $_GET['series']);

        $this->view->listClass = $Classe->seekClass();

        $this->render('management/components/classList', 'SimpleLayout');
    }


    public function classProfile()
    {

        $Student = Container::getModel('Student\\Student');
        $Teacher = Container::getModel('Teacher\\Teacher');
        $Discipline = Container::getModel('Management\\Discipline');
        $Classe = Container::getModel('Management\\Classe');
        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');
        $Exam = Container::getModel('Management\\Exam');

        $ClassDiscipline->__set("fk_id_class", $_GET['id']);
        $Classe->__set('classId', $_GET['id']);

        if (!isset($_SESSION)) session_start();

        $ClassDiscipline->__Set("fk_id_teacher", isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0 );

        $this->view->listStudent = $Student->list("WHERE turma.id_turma = " . $Classe->__get('classId'));
        $this->view->teacherAvailable = $Teacher->teacherAvailable();
        $this->view->disciplinesClassAlreadyAdded = $ClassDiscipline->disciplinesClassAlreadyAdded();
        $this->view->typeStudentList = "class";
        $this->view->classId = $Classe->__get('classId');
        $this->view->typeTeacherList = 'class';
        $this->view->unity = $Exam->unity();
        $this->view->classData = $Classe->list("AND turma.id_turma = " . $Classe->__get('classId'));
        $this->view->listTeacher = $ClassDiscipline->listTeachersClass();

        $teacher_id = isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0;

        $this->view->listExam = $Exam->examList("WHERE turma_disciplina.fk_id_turma = " . $Exam->__get('fk_id_class') . " AND CASE WHEN $teacher_id = 0 THEN turma_disciplina.fk_id_professor <> 0 ELSE turma_disciplina.fk_id_professor = $teacher_id END");

        $this->render('management/components/modalClassProfile', 'SimpleLayout');
    }


    public function classDisciplineInsert()
    {

        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');

        $ClassDiscipline->__set("fk_id_teacher", $_POST['teacher']);
        $ClassDiscipline->__set("fk_id_class", $_POST['classId']);
        $ClassDiscipline->__set("fk_id_discipline", $_POST['disciplineClassId']);

        $ClassDiscipline->insert();
    }


    public function listTeachersDisciplineClass()
    {

        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');
        $Discipline = Container::getModel('Management\\Discipline');
        $Teacher = Container::getModel('Teacher\\Teacher');

        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);

        $this->view->listTeacher = $ClassDiscipline->listTeachersClass();
        $this->view->teacherAvailable = $Teacher->teacherAvailable();

        $this->render('management/components/disciplineClass', 'SimpleLayout');
    }


    public function disciplineAvailable()
    {

        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');

        $ClassDiscipline->__set('fk_id_class', $_POST['classId']);

        echo json_encode($ClassDiscipline->disciplinesNotYetAdded());
    }


    public function subjectAvailableClass()
    {

        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');

        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);

        echo json_encode($ClassDiscipline->subjectAvailableClass());
    }


    public function examList()
    {

        $Exam = Container::getModel('Management\\Exam');

        $Exam->__set("fk_id_class", $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $teacher_id = isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0;

        $this->view->listExam = $Exam->examList("WHERE turma_disciplina.fk_id_turma = " . $Exam->__get('fk_id_class') . " AND CASE WHEN $teacher_id = 0 THEN turma_disciplina.fk_id_professor <> 0 ELSE turma_disciplina.fk_id_professor = $teacher_id END");

        $this->render('management/components/examList', 'SimpleLayout');
    }


    public function recentsExam()
    {

        $Exam = Container::getModel('Management\\Exam');

        $Exam->__set("fk_id_exam_unity", $_GET['unity']);
        $Exam->__set("fk_id_discipline_class", $_GET['disciplineClassId']);

        $this->view->listExam = $Exam->examList("WHERE avaliacoes.fk_id_unidade_avaliacao = " . $Exam->__get('fk_id_exam_unity') . " AND avaliacoes.fk_id_turma_disciplina_avaliacao = " . $Exam->__get('fk_id_discipline_class'));

        $this->view->typeListExam = 'recent';

        $this->render('management/components/examList', 'SimpleLayout');
    }



    public function updateClassDiscipline()
    {

        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');

        $ClassDiscipline->__set("classDisciplineId", $_POST['disciplineClassId']);
        $ClassDiscipline->__set("fk_id_teacher", $_POST['teacher']);
        $ClassDiscipline->__set("fk_id_discipline", $_POST['discipline']);
        $ClassDiscipline->__set("fk_id_class", $_POST['classId']);

        $ClassDiscipline->update();

        $this->view->listTeacher = $ClassDiscipline->listTeachersClass();
    }


    public function disciplineClassDelete()
    {

        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');

        $ClassDiscipline->__set("classDisciplineId", $_POST['disciplineClassId']);

        $ClassDiscipline->delete();
    }


    public function disciplinesClassAlreadyAdded()
    {

        $ClassDiscipline = Container::getModel('Management\\ClassDiscipline');

        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $ClassDiscipline->__Set("fk_id_teacher", isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0 );

        echo json_encode($ClassDiscipline->disciplinesClassAlreadyAdded());
    }


    public function examInsert()
    {

        $Exam = Container::getModel('Management\\Exam');

        $Exam->__set("examDescription", $_POST['examDescription']);
        $Exam->__set("examValue", $_POST['examValue']);
        $Exam->__set("realizeDate", $_POST['realizeDate']);
        $Exam->__set("fk_id_exam_unity", $_POST['unity']);
        $Exam->__set("fk_id_discipline_class", $_POST['disciplineClassId']);

        $Exam->insert();
    }


    public function sumUnitGrades()
    {

        $Exam = Container::getModel('Management\\Exam');

        $Exam->__set("fk_id_exam_unity", $_GET['unity']);
        $Exam->__set("fk_id_discipline_class", $_GET['disciplineClassId']);

        echo json_encode($Exam->sumUnitGrades());
    }


    public function examData()
    {

        $Exam = Container::getModel('Management\\Exam');

        $Exam->__set('examId', $_GET['id']);

        $this->view->examData = $Exam->examList("WHERE avaliacoes.id_avaliacao = " . $Exam->__get('examId'));

        $this->render('management/components/modalExam', 'SimpleLayout');
    }


    public function examUpdate()
    {

        $Exam = Container::getModel('Management\\Exam');

        $Exam->__set('examId', $_POST['examId']);
        $Exam->__set('examDescription', $_POST['examDescription']);
        $Exam->__set('realizeDate', $_POST['realizeDate']);
        $Exam->__set('examValue', $_POST['examValue']);

        $Exam->update();
    }


    public function examDelete()
    {

        $Exam = Container::getModel('Management\\Exam');
        $Exam->__set('examId', $_POST['examId']);
        $Exam->delete();
    }


    public function examSeek()
    {

        $Exam = Container::getModel('Management\\Exam');

        $Exam->__set("fk_id_exam_unity", $_GET['unity']);
        $Exam->__set("fk_id_discipline_class", $_GET['disciplineClassId']);
        $Exam->__set("examDescription", $_GET['examDescription']);
        $Exam->__set("fk_id_class", $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $Exam->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listExam = $Exam->seek();

        $this->render('management/components/examList', 'SimpleLayout');
    }


    public function checkExamName()
    {

        $Exam = Container::getModel('Management\\Exam');

        $Exam->__set("fk_id_exam_unity", $_GET['unity']);
        $Exam->__set("fk_id_discipline_class", $_GET['disciplineClassId']);
        $Exam->__set("examDescription", $_GET['examDescription']);

        echo json_encode($Exam->checkName());
    }


    public function insertExamNote()
    {

        $Note = Container::getModel('Management\\Note');

        $Note->__set("fk_id_student_enrollment", $_POST['enrollmentId']);
        $Note->__set("noteValue", $_POST['noteValue']);
        $Note->__set("fk_id_exam", $_POST['examDescription']);

        $Note->insert();
    }


    public function notesNotAddedYet()
    {

        $Note = Container::getModel('Management\\Note');

        $Note->__set('fk_id_student_enrollment', $_GET['enrollmentId']);
        $Note->__set('fk_id_class', $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        echo json_encode($Note->notesNotAddedYet());
    }


    public function noteListStudent()
    {

        $Note = Container::getModel('Management\\Note');

        $Note->__set('fk_id_student_enrollment', $_GET['enrollmentId']);

        $this->view->listNoteType = 'student';

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listNote = $Note->list("WHERE nota_avaliacao.fk_id_matricula_aluno = " . $Note->__get('fk_id_student_enrollment'));

        $this->render('management/components/noteList', 'SimpleLayout');
    }


    public function noteListClass()
    {

        $Note = Container::getModel('Management\\Note');

        $Note->__set('fk_id_class', $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listNote = $Note->list("WHERE turma_disciplina.fk_id_turma = " . $Note->__get('fk_id_class'));
        $this->view->listNoteType = 'class';

        $this->render('management/components/noteList', 'SimpleLayout');
    }
    

    public function noteSeek()
    {

        $Note = Container::getModel('Management\\Note');

        $Note->__set("fk_id_exam_unity", $_GET['unity']);
        $Note->__set("fk_id_discipline_class", $_GET['disciplineClassId']);
        $Note->__set("examDescription", $_GET['examDescription']);
        $Note->__set("fk_id_student_enrollment", $_GET['enrollmentId']);
        $Note->__set("fk_id_class", $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listNoteType = 'student';

        $this->view->listNote = $Note->seek();

        $this->render('management/components/noteList', 'SimpleLayout');
    }


    public function noteSeekClass()
    {

        $Note = Container::getModel('Management\\Note');

        $Note->__set("fk_id_exam_unity", $_GET['unity']);
        $Note->__set("fk_id_discipline_class", $_GET['disciplineClassId']);
        $Note->__set("examDescription", $_GET['examDescription']);
        $Note->__set("fk_id_student_enrollment", 0);
        $Note->__set("fk_id_class", $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $Note->__set('fk_id_teacher', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listNote = $Note->seek($_GET['orderBy']);
        
        $this->view->listNoteType = 'class';

        $this->render('management/components/noteList', 'SimpleLayout');
    }


    public function noteData()
    {

        $Note = Container::getModel('Management\\Note');
        $Note->__set("noteId", $_GET['id']);

        $this->view->noteData = $Note->list("WHERE nota_avaliacao.id_nota = " . $Note->__get('noteId'));

        $this->render('management/components/modalNote', 'SimpleLayout');
    }


    public function noteUpdate()
    {

        $Note = Container::getModel('Management\\Note');

        $Note->__set("noteId", $_POST['noteId']);
        $Note->__set("noteValue", $_POST['noteValue']);

        $Note->update();
    }


    public function noteDelete()
    {

        $Note = Container::getModel('Management\\Note');

        $Note->__set("noteId", $_POST['noteId']);

        $Note->delete();
    }


    
}
