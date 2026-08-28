<?php

$skaters = [
    [
        "name" => "Ilia Malinin",
        "country" => "USA",
        "discipline" => "Men's Singles",
        "birthYear" => 2004
    ],
    [
        "name" => "Kaori Sakamoto",
        "country" => "Japan",
        "discipline" => "Women's Singles",
        "birthYear" => 2000
    ],
    [
        "name" => "Adam Siao Him Fa",
        "country" => "France",
        "discipline" => "Men's Singles",
        "birthYear" => 2001
    ],
    [
        "name" => "Loena Hendrickx",
        "country" => "Belgium",
        "discipline" => "Women's Singles",
        "birthYear" => 1999
    ],
    [
        "name" => "Yuma Kagiyama",
        "country" => "Japan",
        "discipline" => "Men's Singles",
        "birthYear" => 2003
    ],
    [
        "name" => "Amber Glenn",
        "country" => "USA",
        "discipline" => "Women's Singles",
        "birthYear" => 1999
    ]
];

$totalSkaters = count($skaters);

$disciplineCounts = [];
$countryCounts = [];

foreach ($skaters as $skater) {
    $discipline = $skater["discipline"];
    $country = $skater["country"];

    if (!isset($disciplineCounts[$discipline])) {
        $disciplineCounts[$discipline] = 0;
    }

    if (!isset($countryCounts[$country])) {
        $countryCounts[$country] = 0;
    }

    $disciplineCounts[$discipline]++;
    $countryCounts[$country]++;
}

arsort($countryCounts);

$currentYear = 2026;

$ages = array_map(
    fn($skater) => $currentYear - $skater["birthYear"],
    $skaters
);

$averageAge = round(array_sum($ages) / count($ages), 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Figure Skating Statistics</title>

    <link rel="stylesheet" href="styles.css">
</head>

<body>

<main>

    <h1>Figure Skating Statistics</h1>

    <p>
        Summary statistics for the current sample skating dataset.
    </p>

    <section class="summary">

        <div class="card">
            <h2>Total Skaters</h2>
            <p><?= $totalSkaters ?></p>
        </div>

        <div class="card">
            <h2>Countries</h2>
            <p><?= count($countryCounts) ?></p>
        </div>

        <div class="card">
            <h2>Average Age</h2>
            <p><?= $averageAge ?></p>
        </div>

    </section>

    <section>

        <h2>Skaters by Discipline</h2>

        <table>
            <thead>
                <tr>
                    <th>Discipline</th>
                    <th>Count</th>
                </tr>
            </thead>

            <tbody>

            <?php foreach ($disciplineCounts as $discipline => $count): ?>

                <tr>
                    <td><?= htmlspecialchars($discipline) ?></td>
                    <td><?= $count ?></td>
                </tr>

            <?php endforeach; ?>

            </tbody>
        </table>

    </section>

    <section>

        <h2>Skaters by Country</h2>

        <table>
            <thead>
                <tr>
                    <th>Country</th>
                    <th>Count</th>
                </tr>
            </thead>

            <tbody>

            <?php foreach ($countryCounts as $country => $count): ?>

                <tr>
                    <td><?= htmlspecialchars($country) ?></td>
                    <td><?= $count ?></td>
                </tr>

            <?php endforeach; ?>

            </tbody>
        </table>

    </section>

</main>

</body>
</html>