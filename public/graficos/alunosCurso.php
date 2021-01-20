<?php

    $UX = $matriculaServicos->alunoPorCursoTotal('1');
    $UX = (array_values ($UX)[0]);

    $analista= $matriculaServicos->alunoPorCursoTotal('2');
    $analista= (array_values ($analista)[0]);

    $info = $matriculaServicos->alunoPorCursoTotal('3');
    $info = (array_values ($info)[0]);

?>