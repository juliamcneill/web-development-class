<!doctype html>
<html lang="en-us">
  <head>
    <title>Julia McNeill</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
    <link rel="stylesheet" type="text/css" href="../style/php.css">
  </head>
  <body>

    <h1>Myers-Briggs Test Results</h1>

    <?php

      $answers = $_POST['answers'];

      $e = 0;
      $i = 0;
      $s = 0;
      $n = 0;
      $t = 0;
      $f = 0;
      $j = 0;
      $p = 0;

      for ($index = 0; $index < sizeof($answers); $index++) {
        if ($answers[$index] == 'e') {
          $e++;
        } else if ($answers[$index] == 'i') {
          $i++;
        } else if ($answers[$index] == 's') {
          $s++;
        } else if ($answers[$index] == 'n') {
          $n++;
        } else if ($answers[$index] == 't') {
          $t++;
        } else if ($answers[$index] == 'f') {
          $f++;
        } else if ($answers[$index] == 'j') {
          $j++;
        } else if ($answers[$index] == 'p') {
          $p++;
        }
      }

      $type = '';
      if ($e > $i) {
        $type .= 'E';
      } else {
        $type .= 'I';
      }

      if ($s > $n) {
        $type .= 'S';
      } else {
        $type .= 'N';
      }

      if ($t > $f) {
        $type .= 'T';
      } else {
        $type .= 'F';
      }

      if ($j > $p) {
        $type .= 'J';
      } else {
        $type .= 'P';
      }

      $file = '../data/tracker.txt';
      file_put_contents($file, $type . "\n", FILE_APPEND);

      $title = '';
      $description = '';

      if ($type == 'INTP') {
        $title .= 'Thinker';
        $description .= 'INTPs prefer spending time alone so they can explore their rich inner world, and prolonged exposure to big groups of people can make them feel drained. Their focus lies more on understanding the big picture than on noticing the tiny details. They want to know how things connect together, which gives them great intuition for solving complex problems. As the most thinking-oriented of the types, they rely on logic rather than emotion as their main influence in decision making. An INTP normally likes to keep their options open rather than locking themselves into a commitment. They’re flexible and spontaneous, which allows them to capitalize on opportunities that come available at the 11th hour.';
      } else if ($type == 'INTJ') {
        $title .= 'Intellectual';
        $description .= 'INTJs like to have time alone to recharge and think introspectively. They tend to listen to their strong intuition and love to see how everything connects together. They are focused on the bigger picture and may overlook small details. Intellectuals are very logical and rational. They base decisions on what makes sense and might have a harder time connecting emotionally. They are organized and prefer following a plan. They love to set and achieve goals.';
      } else if ($type == 'INFP') {
        $title .= 'Empath';
        $description .= 'INFPs value time alone or with very small groups and can often feel exhausted after spending time with large groups of people. They tend to focus on the big picture and don’t get lost on the smaller details. They have strong intuitions and often follow their gut instincts. Empaths tend to prioritize emotion and make decisions that feel right. They are very diplomatic and can easily understand others emotions. They are very flexible in their schedules. INFPs like to keep their options open and tend to be more spontaneous.';
      } else if ($type == 'INFJ') {
        $title .= 'Advisor';
        $description .= 'Introverted INFJs exhaust quickly around people and recharge by spending time by themselves. They tend to overlook small details and instead focus on the entire perspective. They love to see how everything connects together. Advisors prioritize their emotions. They tend to base decisions on what they feel is right rather than what might be logically sound, making them very empathetic. They are also very structured and organized. INFJs like to plan ahead and follow processes and schedules.';
      } else if ($type == 'ISTP') {
        $title .= 'Detective';
        $description .= 'Detectives are generally more reserved and prefer being alone. They are self-sufficient, independent thinkers. They are very observant and focus on the details of a situation, trusting facts and making decisions based on the here-and-now. ISTP types favor logic and reason over emotional influences. They base their decisions on what makes sense. They are also spontaneous and prefer keeping their options open. Detectives are often more adaptable and less aware of time.';
      } else if ($type == 'ISTJ') {
        $title .= 'Investigator';
        $description .= 'Introverted ISTJ types process the world internally. They tend to feel drained after social events and need time alone to recharge. Highly pragmatic, they tend to focus more on the details, rather than the bigger picture. They make decisions based on what they see and know right now. Investigators prioritize logical thinking and are more concerned with facts than emotion. They believe the truth is more important than people’s feelings. They are very structured and organized, preferring to plan ahead and follow rules and processes. They are disciplined and have a strong work ethic.';
      } else if ($type == 'ISFP') {
        $title .= 'Creator';
        $description .= 'ISFP types need plenty of personal space. Though they enjoy building connections with people, they need alone time to think and recharge. They are very observant, especially focusing on the details more than the overall view. They live in the present and tend to base decisions on what they can see right now. Creators also prioritize emotion when making decisions. They prefer to follow what feels right. They don’t like schedules, but instead prefer to keep their options open. They are adaptable, spontaneous, and like to challenge the need for strict rules.';
      } else if ($type == 'ISFJ') {
        $title .= 'Guardian';
        $description .= 'ISFJ types need time alone to re-energize. They are self-sufficient, independent thinkers. They are very observant and prefer to focus on the details of every situation. They listen to and follow past experience and present understandings. Guardians prioritize the emotional needs of others. They make decisions based on what feels right, rather than what might make most logical sense. They also prefer structure and organization, tending to follow rules and processes to an end goal. They are responsible and have a strong work ethic.';
      } else if ($type == 'ENTP') {
        $title .= 'Debater';
        $description .= 'As extroverts, ENTP types have higher levels of energy and love being around other people. They tend to avoid being alone. They are more interested in the big picture than on specifics and details. They love solving complex problems and have a great sense of intuition. Debaters make decisions based on logic. They care less about what makes people happy and more about what’s right. They dislike schedules and routine, preferring to keep their options open. They love surprise experiences and challenge the need for rules and regulations.';
      } else if ($type == 'ENTJ') {
        $title .= 'Visionary';
        $description .= 'As ENTJs, Visionaries are talkative, high energy, and thrive around people. They seek action and tend to involve themselves in events. They prefer not to spend too much time alone. They focus more on the big picture than on tiny details—they’re interested in how everything connects together and trust their internal thought process more than they trust past experience. ENTJs use logic rather than emotion in decision making. They tend to follow what makes sense, rather than what feels right. They are structured, organized, like to plan ahead and know what’s going to happen. They appreciate rules, processes, and schedules.';
      } else if ($type == 'ENFP') {
        $title .= 'Encourager';
        $description .= 'ENFP types are generally very outgoing and lively, preferring to go out rather than stay in. They love conversing with other people and generally process their thoughts externally. They are great problem solvers and enjoy figuring out how everything is connected. They tend to focus more on the future than the present. Encouragers like to keep the peace and avoid conflict. They care more about subjective principles than logic and fact. They are flexible and spontaneous, preferring to keep their options open. They dislike routines, schedules, and strict rules.';
      } else if ($type == 'ENFJ') {
        $title .= 'Advocate';
        $description .= 'ENFJs are high-energy people who dislike spending too much time alone. They take initiative and tend to talk more than they listen. They usually trust their intuition and focus on the future. They are good at analyzing complex ideas. Advocates are motivated by feelings and values. They work to avoid conflict and are very diplomatic. They like to make lists and schedules, preferring to follow a plan. They are hard-working and responsible.';
      } else if ($type == 'ESTP') {
        $title .= 'Explorer';
        $description .= 'ESTP types like being around large groups of people, whether they know them or not. They prefer being out in action to being at home by themselves. They are very observant, detail-oriented people. They are practical and realistic, focusing on the here-and-now. Explorers make decisions based in logic. They care more about following the truth than making other people happy. They avoid schedules, preferring to make plans as they go. They less aware of time and enjoy being adaptable.';
      } else if ($type == 'ESTJ') {
        $title .= 'Commander';
        $description .= 'ESTJ types are very high energy. They’d rather spend their time with other people than alone. They tend to pay more attention to the details of a situation. They make decisions based on what they see right now. Commanders base their decisions on what makes sense, rather than what feels right. They listen to their head, not their heart. They are responsible and like to plan ahead. They hold themselves accountable by making lists and following set processes and rules.';
      } else if ($type == 'ESFP') {
        $title .= 'Entertainer';
        $description .= 'ESFPs are very outgoing, lively people. They thrive in groups and prefer not to spend too much time alone. They are very observant, focusing closely on the details rather than the grand scheme. They think in terms of the present. Entertainers tend to prioritize emotion when making decisions, concerning themselves more with how their decisions will affect others. They are empathetic and diplomatic. They rely more on opportunity than rigid scheduling. They are spontaneous, playful people, with a passion for finding new adventures.';
      } else if ($type == 'ESFJ') {
        $title .= 'Provider';
        $description .= 'As extroverts, Providers are talkative, energetic, and thrive around people. They prefer not to spend too much time alone. Highly observant, their focus lies more on the details than on how everything connects together. They trust facts over theories—and they make decisions based on what they can see right now. ESFJs are feelers who prioritize emotion rather than logic in their decision-making. Empathetic and diplomatic, they do what feels right rather than what makes sense. They’re structured and organized, preferring to plan ahead so they know what’s going to happen. They like rules, processes and schedules.';
      }

    ?>

    <form action="../php.html">
      <p>Your Type is <?php print $type; ?>: <em>The <?php print $title; ?></em></p>
      <p><?php print $description; ?></p>
      <input type="submit"value="Take the Quiz Again!">
      <p id="source">Description Source: <a href="https://www.crystalknows.com/myers-briggs-test" target="_blank">Crystal Knows</a></p>
    </form>
    <form action="tracker.php">
      <input type="submit" value="See All Results">
    </form>

  </body>
</html>
