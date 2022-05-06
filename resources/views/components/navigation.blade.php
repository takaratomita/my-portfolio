<?php
// スロットで受け取った値をキャスト
$id = ((int) trim($id));
$last_id = ((int) trim($last_id));

$prev_id = 0;
$next_id = 0;

$id === 1 ? $prev_id = $last_id : $prev_id = $id - 1;
$id === $last_id ? $next_id = 1 : $next_id = $id + 1;
?>
<div class="navigation" id="navigation">
    <div class="prev shadow-box hov hov-box">
        <a href="{{ $prev_id }}"><i class="fa-solid fa-angle-left"></i></a>
    </div>
    <div class="home shadow-box hov hov-box">
        <a href="/"><i class="fa-solid fa-home"></i></a>
    </div>
    <div class="next shadow-box hov hov-box">
        <a href="{{ $next_id }}"><i class="fa-solid fa-angle-right"></i></a>
    </div>
</div>
