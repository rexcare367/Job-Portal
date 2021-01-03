<?php

if (!function_exists('renderYearOptions')) {
  function renderYearOptions($old = "")
  {
    $year = date('Y') + 1;
    $a = 0;
    while ($a < 9) {
      $year--;
      $selected = empty($old) ? "" : ($year == $old ? "selected" : "");
      echo '<option ' . $selected . ' value="' . $year . '">' . $year . '</option>';
      $a++;
    }
  }
}

if (!function_exists('renderExperienceOptions')) {
  function renderExperienceOptions($old = "")
  {
    $experience = [
      ["label" => "0 (Fresher)", "value" => 0],
      ["label" => "06 Months", "value" => 6],
      ["label" => "1 Year", "value" => 12],
      ["label" => "1.5 Years", "value" => 18],
      ["label" => "2 Years", "value" => 24],
      ["label" => "2.5 Years", "value" => 30],
      ["label" => "3 Years", "value" => 36],
      ["label" => "3+ Years", "value" => 50],
    ];

    foreach ($experience as $key => $experience) {
      $selected = empty($old) ? "" : ($experience["value"] == $old ? "selected" : "");
      echo '<option ' . $selected . ' value="' . $experience["value"] . '">' . $experience["label"] . '</option>';
    }
  }
}
