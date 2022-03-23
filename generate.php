<?php


function generateSentence()
{

    $singular_nouns = json_decode(file_get_contents("elements/nouns/singular_nouns.json"));
    $plural_nouns = json_decode(file_get_contents("elements/nouns/plural_nouns.json"));
    $nouns = array_merge($singular_nouns, $plural_nouns);
    $sentences = json_decode(file_get_contents("elements/sentences.json"));
    $sentences_extension = json_decode(file_get_contents("elements/sentences_extension.json"));
    $infinitif_verb = json_decode(file_get_contents("elements/verbs/infinitif_verbs.json"));
    $participe_passé_verb = json_decode(file_get_contents("elements/verbs/participe_passé_verbs.json"));

    $sentence = $sentences[random_int(0, Count($sentences) - 1) ].", ".$sentences_extension[random_int(0, Count($sentences_extension) - 1) ];

    while (strpos($sentence, "%noun%") !== false || strpos($sentence, "%singular_noun%") !== false || strpos($sentence, "%plural_noun%") !== false || strpos($sentence, "%noun_be%") !== false)
    {

        $sentence = str_replace_first("%singular_noun%", $singular_nouns[random_int(0, Count($singular_nouns) - 1) ], $sentence);
        $sentence = str_replace_first("%plural_noun%", $plural_nouns[random_int(0, Count($plural_nouns) - 1) ], $sentence);
        $sentence = str_replace_first("%noun%", $nouns[random_int(0, Count($nouns) - 1) ], $sentence);
        $sentence = str_replace_first("%infinitif_verb%", $infinitif_verb[random_int(0, Count($infinitif_verb) - 1) ], $sentence);
        $sentence = str_replace_first("%participe_passé_verb%", $participe_passé_verb[random_int(0, Count($participe_passé_verb) - 1) ], $sentence);

        if (strpos($sentence, "%noun_be%") !== false)
        {

            $rng = random_int(0, (Count($singular_nouns) + Count($plural_nouns)) - 1);

            if ($rng < Count($singular_nouns))
            {

                $noun_be = $singular_nouns[random_int(0, Count($singular_nouns) - 1) ] . ' is';

            }
            else
            {

                $noun_be = $plural_nouns[random_int(0, Count($plural_nouns) - 1) ] . ' are';

            }

            $sentence = str_replace_first("%noun_be%", $noun_be, $sentence);
        }

    }

    if (strpos($sentence, "%") === false) // Il n'y a plus de parties à compléter
    {
        return ucfirst($sentence);

    }
    else
    {

        return generateSentence();

    }

}

function generateSentence_old()
{

    $singular_nouns = json_decode(file_get_contents("elements/nouns/singular_nouns.json"));
    $plural_nouns = json_decode(file_get_contents("elements/nouns/plural_nouns.json"));
    $nouns = array_merge($singular_nouns, $plural_nouns);
    $sentences = json_decode(file_get_contents("elements/sentences_old.json"));

    $sentence = $sentences[random_int(0, Count($sentences) - 1) ];

    while (strpos($sentence, "%noun%") !== false || strpos($sentence, "%singular_noun%") !== false || strpos($sentence, "%plural_noun%") !== false || strpos($sentence, "%noun_be%") !== false)
    {

        $sentence = str_replace_first("%singular_noun%", $singular_nouns[random_int(0, Count($singular_nouns) - 1) ], $sentence);
        $sentence = str_replace_first("%plural_noun%", $plural_nouns[random_int(0, Count($plural_nouns) - 1) ], $sentence);
        $sentence = str_replace_first("%noun%", $nouns[random_int(0, Count($nouns) - 1) ], $sentence);

        if (strpos($sentence, "%noun_be%") !== false)
        {

            $rng = random_int(0, (Count($singular_nouns) + Count($plural_nouns)) - 1);

            if ($rng < Count($singular_nouns))
            {

                $noun_be = $singular_nouns[random_int(0, Count($singular_nouns) - 1) ] . ' is';

            }
            else
            {

                $noun_be = $plural_nouns[random_int(0, Count($plural_nouns) - 1) ] . ' are';

            }

            $sentence = str_replace_first("%noun_be%", $noun_be, $sentence);
        }

    }

    if (strpos($sentence, "%") === false) // Il n'y a plus de parties à compléter
    {
        return ucfirst($sentence);

    }
    else
    {

        return generateSentence();

    }

}

function str_replace_first($search, $replace, $subject)
{
    $pos = strpos($subject, $search);
    if ($pos !== false)
    {
        return substr_replace($subject, $replace, $pos, strlen($search));
    }
    return $subject;
}


?>