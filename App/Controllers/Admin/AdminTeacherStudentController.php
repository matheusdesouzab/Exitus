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
        $this->view->examData = $Exam->dataGeneral();

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
        $Teacher = Container::getModel('Teacher\\Teacher');
        $Classe = Container::getModel('GeneralManagement\\Classe');

        $Exam->__set("fk_id_exam_unity", $_GET['unity']);
        $Exam->__set("fk_id_discipline_class", $_GET['disciplineClass']);
        $Exam->__set("examDescription", $_GET['examDescription']);

        if (!isset($_SESSION)) session_start();

        $Teacher->__set('teacherId', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);
        $Classe->__set('classId', $_GET['classId']);

        $this->view->listExam = $Exam->seek($Classe, $Teacher);

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

        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');
        $Exam = Container::getModel('TeacherStudent\\Exam');
        $Classe = Container::getModel('GeneralManagement\\Classe');

        if (!isset($_SESSION)) session_start();

        if (isset($_SESSION['Teacher']['id'])) $ClassDiscipline->__set("fk_id_class", $_GET['classId']);
        if (isset($_SESSION['Teacher']['id'])) $ClassDiscipline->__set("fk_id_teacher", $_SESSION['Teacher']['id']);

        $Classe->__set('classId', $_GET['classId']);

        $this->view->listExam = isset($_SESSION['Teacher']['id']) ? $ClassDiscipline->subjectsLinkedTeacher() : $Exam->readExamByIdClass($Classe);

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
        $Teacher = Container::getModel('Teacher\\Teacher');

        $Note->__set('fk_id_student_enrollment', $_GET['enrollmentId']);
        $Note->__set('fk_id_class', $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $Teacher->__set("teacherId", isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        echo json_encode($Note->notesNotAddedYet($Teacher));
    }


    public function noteData()
    {

        $Note = Container::getModel('TeacherStudent\\Note');
        $Note->__set("noteId", $_GET['id']);

        $this->view->noteData = $Note->dataGeneral();

        $this->render('student/components/modalNote', 'SimpleLayout');
    }


    public function noteListStudent()
    {

        $Note = Container::getModel('TeacherStudent\\Note');
        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');
        $StudentEnrollment = Container::getModel('Student\\StudentEnrollment');

        if (!isset($_SESSION)) session_start();
        if (isset($_SESSION['Teacher']['id'])) $ClassDiscipline->__set('fk_id_teacher', $_SESSION['Teacher']['id']);

        $Note->__set('fk_id_student_enrollment', $_GET['enrollmentId']);
        $StudentEnrollment->__set('studentEnrollmentId', $_GET['enrollmentId']);

        $this->view->listNote = isset($_SESSION['Teacher']['id']) ? $ClassDiscipline->notesLinkedStudentClassTeacher($StudentEnrollment) : $Note->readByIdStudent();
        $this->view->listNoteType = 'student';

        $this->render('student/components/studentGradeList', 'SimpleLayout');
    }


    public function noteListClass()
    {

        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');
        $Classe = Container::getModel('GeneralManagement\\Classe');
        $Note = Container::getModel('TeacherStudent\\Note');

        if (!isset($_SESSION)) session_start();
        if (isset($_SESSION['Teacher']['id'])) $ClassDiscipline->__set('fk_id_teacher', $_SESSION['Teacher']['id']);

        $ClassDiscipline->__set('fk_id_class', $_GET['classId']);

        $Classe->__set('classId', $_GET['classId']);

        $this->view->listNote = isset($_SESSION['Teacher']['id']) ? $ClassDiscipline->notesLinkedTeacherClass() : $Note->readNoteByClassId($Classe);
        $this->view->listNoteType = 'class';

        $this->render('student/components/noteList', 'SimpleLayout');
    }


    public function noteSeek()
    {

        $Note = Container::getModel('TeacherStudent\\Note');
        $Classe = Container::getModel('GeneralManagement\\Classe');
        $Teacher = Container::getModel('Teacher\\Teacher');

        $Note->__set("fk_id_exam_unity", $_GET['unity']);
        $Note->__set("fk_id_discipline_class", $_GET['disciplineClass']);
        $Note->__set("examDescription", $_GET['examDescription']);
        $Note->__set("fk_id_student_enrollment", $_GET['enrollmentId']);

        $Classe->__set("classId", $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $Teacher->__set('teacherId', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listNoteType = 'student';
        $this->view->listNote = $Note->seek($Classe, $Teacher);

        $this->render('student/components/studentGradeList', 'SimpleLayout');
    }


    public function noteSeekClass()
    {

        $Note = Container::getModel('TeacherStudent\\Note');
        $Classe = Container::getModel('GeneralManagement\\Classe');
        $Teacher = Container::getModel('Teacher\\Teacher');

        $Note->__set("fk_id_exam_unity", $_GET['unity']);
        $Note->__set("fk_id_discipline_class", $_GET['disciplineClass']);
        $Note->__set("examDescription", $_GET['examDescription']);
        $Note->__set("fk_id_student_enrollment", 0);

        $Classe->__set("classId", $_GET['classId']);

        if (!isset($_SESSION)) session_start();

        $Teacher->__set('teacherId', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $this->view->listNote = $Note->seek($Classe, $Teacher, $_GET['orderBy']);
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
        $this->view->listObservation = $Observation->readByIdStudent();

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
        $Teacher = Container::getModel('Teacher\\Teacher');

        if (!isset($_SESSION)) session_start();
        if (isset($_SESSION['Teacher']['id'])) $Teacher->__set("teacherId", $_SESSION['Teacher']['id']);

        $Lack->__set('fk_id_enrollment', $_GET['enrollmentId']);

        $this->view->lackList = isset($_SESSION['Teacher']['id']) ? $Lack->readByIdTeacher($Teacher) : $Lack->readByIdStudent();

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
        $this->view->lackData = $Lack->dataGeneral();

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

        $DisciplineAverage = Container::getModel('TeacherStudent\\DisciplineAverage');
        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');
        $StudentEnrollment = Container::getModel('Student\\StudentEnrollment');
        $Lack = Container::getModel('TeacherStudent\\Lack');
        $Teacher = Container::getModel('Teacher\\Teacher');

        if (!isset($_SESSION)) session_start();
        if (isset($_SESSION['Teacher']['id'])) $ClassDiscipline->__set("fk_id_teacher", $_SESSION['Teacher']['id']);

        $enrollmentId = (!isset($_GET['enrollmentId']) ? $_SESSION['Student']['enrollmentId'] : $_GET['enrollmentId']);
        $classId = (!isset($_GET['classId']) ? $_SESSION['Student']['classId'] : $_GET['classId']);
        $teacherId = (isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $StudentEnrollment->__set('studentEnrollmentId', $enrollmentId);
        $DisciplineAverage->__set('fk_id_enrollment', $enrollmentId);
        $ClassDiscipline->__set("fk_id_teacher", $teacherId);
        $ClassDiscipline->__set("fk_id_class", $classId);
        $Lack->__set('fk_id_enrollment', $enrollmentId);
        $Teacher->__set('teacherId', $teacherId);

        $this->view->bulletin = isset($_SESSION['Teacher']['id']) ? $StudentEnrollment->readBulletinSelectedDisciplines($Teacher) : $StudentEnrollment->readFullBulletin();
        $this->view->linkedDisciplines = isset($_SESSION['Teacher']['id']) ? $ClassDiscipline->teacherLinkedDisciplines() : $ClassDiscipline->classLinkedSubjects();
        $this->view->lackList = isset($_SESSION['Teacher']['id']) ? $Lack->readByIdTeacher($Teacher) : $Lack->readByIdStudent();
        $this->view->disciplineAverageList = $DisciplineAverage->readByIdStudent();
        $this->view->enrollmentId = $StudentEnrollment->dataGeneral('<> 0');

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
        $Teacher = Container::getModel('Teacher\\Teacher');

        $DisciplineAverage->__set('fk_id_enrollment', $_GET['enrollmentId']);

        if (!isset($_SESSION)) session_start();
        if (isset($_SESSION['Teacher']['id'])) $Teacher->__set("teacherId", $_SESSION['Teacher']['id']);

        $this->view->disciplineAverageList = isset($_SESSION['Teacher']['id']) ? $DisciplineAverage->readByIdTeacher($Teacher) : $DisciplineAverage->readByIdStudent();
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


    public function disciplineMediaUpdate()
    {

        $DisciplineAverage = Container::getModel('TeacherStudent\\DisciplineAverage');

        $DisciplineAverage->__set('disciplineAverageId', $_POST['id']);
        $DisciplineAverage->__set('fk_id_subtitle', $_POST['subtitle']);
        $DisciplineAverage->__set('average', $_POST['average']);

        $DisciplineAverage->update();
    }


    public function overallStudentAverages()
    {

        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');
        $Unity = Container::getModel('GeneralManagement\\Unity');
        $Classe = Container::getModel('GeneralManagement\\Classe');
        $Teacher = Container::getModel('Teacher\\Teacher');
        $Note = Container::getModel('TeacherStudent\\Note');
        $Exam = Container::getModel('TeacherStudent\\Exam');
        $StudentEnrollment = Container::getModel('Student\\StudentEnrollment');

        if (!isset($_SESSION)) session_start();

        if (isset($_SESSION['Teacher']['id'])) {
            $Teacher->__set('teacherId', $_SESSION['Teacher']['id']);
            $ClassDiscipline->__set("fk_id_teacher", $_SESSION['Teacher']['id']);
            $Note->__set("fk_id_teacher", $_SESSION['Teacher']['id']);
            $Note->__set("fk_id_student_enrollment", $_GET["enrollmentId"]);
        }

        $ClassDiscipline->__set("fk_id_class",$_GET['classId']);
        $Classe->__set("classId",$_GET['classId']);
        $Unity->__set('unityId', 0);

        $StudentEnrollment->__set("studentEnrollmentId", $_GET['enrollmentId']);

        $this->view->listStudent = $StudentEnrollment->dataGeneral();
        $this->view->listNote = isset($_SESSION['Teacher']['id']) ? $Note->readNoteByIdTeacher($Teacher) : $Note->readNoteByClassId($Classe);
        $this->view->linkedDisciplines = isset($_SESSION['Teacher']['id']) ? $ClassDiscipline->teacherLinkedDisciplines() : $ClassDiscipline->classLinkedSubjects();
        $this->view->unity = $Unity->searchSpecificUniy();
        $this->view->listExam = $Exam->readExamByIdClass($Classe);
        $this->view->noteStatus = 0;
        $this->view->orderBy = 'alphabetical';
        $this->view->averageType = 'averageUnity';
        $this->view->listType = 'student';

        $this->render('student/components/studentsAverage', 'SimpleLayout');
    }


    public function seekOverallStudentAverages()
    {

        $ClassDiscipline = Container::getModel('GeneralManagement\\ClassDiscipline');
        $Unity = Container::getModel('GeneralManagement\\Unity');
        $Classe = Container::getModel('GeneralManagement\\Classe');
        $Teacher = Container::getModel('Teacher\\Teacher');
        $StudentEnrollment = Container::getModel('Student\\StudentEnrollment');
        $Exam = Container::getModel('TeacherStudent\\Exam');
        $Note = Container::getModel('TeacherStudent\\Note');

        if (!isset($_SESSION)) session_start();

        if (isset($_SESSION['Teacher']['id'])) {
            $Teacher->__set('teacherId', $_SESSION['Teacher']['id']);
            $ClassDiscipline->__set("fk_id_teacher", $_SESSION['Teacher']['id']);
        }

        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);
        $Classe->__set("classId", $_GET['classId']);

        $Exam->__set('fk_id_discipline_class', $_GET['disciplineClass']);
        $Exam->__set('fk_id_exam_unity', $_GET['unity']);

        $StudentEnrollment->__set("studentEnrollmentId", $_GET["enrollmentId"]);

        $Teacher->__set('teacherId', isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $Note->__set("fk_id_exam_unity", $_GET['unity']);
        $Note->__set("fk_id_discipline_class", $_GET['disciplineClass']);
        $Note->__set("examDescription", '');
        $Note->__set("fk_id_student_enrollment", 0);

        $ClassDiscipline->__set("fk_id_class", $_GET['classId']);
        $ClassDiscipline->__set("classDisciplineId", $_GET['disciplineClass']);
        $ClassDiscipline->__set("fk_id_teacher", isset($_SESSION['Teacher']['id']) ? $_SESSION['Teacher']['id'] : 0);

        $Unity->__set("unityId", $_GET['unity']);

        $this->view->listStudent = $StudentEnrollment->dataGeneral();
        $this->view->listNote = $Note->seek($Classe, $Teacher);
        $this->view->linkedDisciplines = $ClassDiscipline->searchClassSubjects();
        $this->view->unity = $Unity->searchSpecificUniy();
        $this->view->listExam = $Exam->seek($Classe, $Teacher);
        $this->view->orderBy = $_GET['orderBy'];
        $this->view->noteStatus = $_GET['noteStatus'];
        $this->view->averageType = $_GET['averageType'];
        $this->view->listType = 'student';

        $this->render('student/components/studentsAverage', 'SimpleLayout');
    }
  
}
