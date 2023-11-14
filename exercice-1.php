<?php


// si cette date est soit du lundi au vendredi
function isWeekday($date) {
    // Retourne true si la date est un jour de la semaine (lundi - vendredi) (c'est-à-dire le premier jour de la semaine jusqu'au 5ème)
    return (date('N', strtotime($date)) >= 1 && date('N', strtotime($date)) <= 5);
}

// si on est sur des jours fériés
function isHoliday($timestamp) {
    $jour = date("d", $timestamp);
    $mois = date("m", $timestamp);
    $annee = date("Y", $timestamp);
    $estFerie = 0;

    // Vérification des jours fériés fixes
    if ($jour == 1 && $mois == 1) $estFerie = 1; // 1er janvier
    if ($jour == 1 && $mois == 5) $estFerie = 1; // 1er mai
    if ($jour == 8 && $mois == 5) $estFerie = 1; // 8 mai
    if ($jour == 14 && $mois == 7) $estFerie = 1; // 14 juillet
    if ($jour == 15 && $mois == 8) $estFerie = 1; // 15 aout
    if ($jour == 1 && $mois == 11) $estFerie = 1; // 1 novembre
    if ($jour == 11 && $mois == 11) $estFerie = 1; // 11 novembre
    if ($jour == 25 && $mois == 12) $estFerie = 1; // 25 décembre

    // Cette ligne ne doit pas être présente, mais je vois uniquement dans 
    // le contexte de paques que l'on peut avoir 6 jours de congé demandé
    // pour les dates du mois d'avril
    if ($jour == 10 && $mois == 4) $estFerie = 1; // 10 avril (paques)

    return $estFerie;
}

// Nous affiche soit le nombre de congé de poser ou sinon cela nous indique si on a dépassé
function calculateWorkingDays($start_date, $end_date, $congeSolde) {
    echo $start_date." -> ".$end_date."<br>";
    $start = date_create($start_date);
    $end = date_create($end_date);
    $interval = date_diff($start, $end); // Nous donne le nombre de jour (l'interval) entre les deux dates
    $days = $interval->days + 1; // Nous permet d'avoir le nombre de jour et au minimum 1

    $workingDays = 0;
    for ($i = 0; $i < $days; $i++) {
        $currentDate = date('Y-m-d', strtotime("$start_date + $i days"));
        // echo "$currentDate [$i] (+ $i days) ";
        if (isWeekday($currentDate) && !isHoliday(strtotime($currentDate))) {
            $workingDays++;
        }
    }

    $remainingDays = $congeSolde - $workingDays;
    if ($remainingDays >= 0) {
        return "$workingDays jours de congés.<br>";
    } else {
        return "Vous n'avez pas assez de congés, il vous manque " . abs($remainingDays) . " jours [$workingDays jour(s) demandé(s)]<br>";
    }
}

echo "<pre>";
// Tests avec les dates fournies
echo calculateWorkingDays('2023-03-20', '2023-03-24', 5) . "<br>";
echo calculateWorkingDays('2023-04-01', '2023-04-11', 5) . "<br>";
echo calculateWorkingDays('2023-07-12', '2023-07-19', 5) . "<br>";
echo "</pre>";