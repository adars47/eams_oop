
<html>
<head>

</head>
<body>
<header> <?php require "Base/header.php"?></header>
<div class="container-fluid text-center">
    <div class="content">
        <h1 class="text-center">Nepal </h1>
        <h2>Safari</h2>
        <?php
            $nepal =$args['nepal'];
            foreach ($nepal['safari'] as $item)
            {
                ?>
                <h3> <?= $item->name ?> </h3>
                <p>
                    <ul style="list-style-type:none;">
                        <li> cost: <?= $item->charge ?> </li>
                        <li> duration: <?= $item->length ?> days </li>
                        <li> difficulty: <?= $item->physical_difficulty ?> </li>
                        <a href="/book"><button>Book</button></a>
                    </ul>
                </p>
            <?php
            }
?>
        <h1>Nepal Tours</h1>

        <?php
        foreach ($nepal['tours'] as $item)
        {
            ?>
            <h3> <?= $item->name ?> </h3>
            <p>
            <ul style="list-style-type:none;">
                <li> cost: <?= $item->charge ?> </li>
                <li> duration: <?= $item->length ?> days </li>
                <li> difficulty: <?= $item->physical_difficulty ?> </li>
                <a href="/book"><button>Book</button></a>
        </ul>
            </p>
         <?php
        }
        ?>

<!--        usa-->
        <h1 class="text-center">USA </h1>
        <h2>Safari</h2>
        <?php
        $usa =$args['usa'];
        foreach ($usa['safari'] as $item)
        {
            ?>
            <h3> <?= $item->name ?> </h3>
            <p>
            <ul style="list-style-type:none;">
                <li> cost: <?= $item->charge ?> </li>
                <li> duration: <?= $item->length ?> days </li>
                <li> difficulty: <?= $item->physical_difficulty ?> </li>
                <a href="/book"><button>Book</button></a>
            </ul>
            </p>
            <?php
        }
        ?>
        <h1>Tours</h1>

        <?php
        foreach ($usa['tours'] as $item)
        {
            ?>
            <h3> <?= $item->name ?> </h3>
            <p>
                <ul style="list-style-type:none;">
                    <li> cost: <?= $item->charge ?> </li>
                    <li> duration: <?= $item->length ?> days </li>
                    <li> difficulty: <?= $item->physical_difficulty ?> </li>
                    <a href="/book"><button>Book</button></a>
                </ul>
            </p>
            <?php
        }
        ?>

    </div>
</div>

</body>

</html>
