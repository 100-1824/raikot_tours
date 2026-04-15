<?php
/**
 * Tour and Trek Descriptors with Place Information
 * Includes tour descriptions, trek details, and place info
 */

$tours = array(
    'hunza-valley' => array(
        'title' => 'Hunza Valley 7-Day Tour',
        'price' => '$850',
        'duration' => '7 Days',
        'difficulty' => 'Easy',
        'season' => 'April - October',
        'description' => 'Explore the breathtaking Hunza Valley, known for the longevity of its inhabitants and stunning mountain views.',
        'highlights' => array(
            'Altit & Baltit Forts – ancient palatial structures',
            'Attabad Lake – crystal clear alpine lake',
            'Karimabad – traditional Hunza village',
            'Rakaposhi views – 7,788m peak',
            'Local hospitality & organic apricots',
        ),
        'itinerary' => 'Day 1-2: Drive to Hunza via Karakoram Highway. Day 3-4: Fort tours & village walks. Day 5: Attabad Lake exploration. Day 6: Rakaposhi viewpoint trek. Day 7: Return journey.',
        'place_info' => 'Hunza Valley is located in the Gilgit-Baltistan region at 2,400m elevation. Known for healthy, long-lived inhabitants and terraced agriculture.',
    ),
    'fairy-meadows' => array(
        'title' => 'Fairy Meadows Trek to Nanga Parbat Base Camp',
        'price' => '$750',
        'duration' => '5 Days',
        'difficulty' => 'Moderate',
        'season' => 'May - September',
        'description' => 'Hike to the base camp of Nanga Parbat, the 9th highest mountain in the world, and stay in cozy wooden cabins.',
        'highlights' => array(
            'Nanga Parbat Base Camp (3,300m)',
            'Fairy Meadows alpine meadow',
            'Glacier views & mountain panorama',
            'Traditional jeep safari to starting point',
            'Wooden cabin accommodation',
        ),
        'itinerary' => 'Day 1: Auli Nallah starting point. Day 2-3: Trek through forest to meadows. Day 4: Base camp exploration. Day 5: Return trek.',
        'place_info' => 'Nanga Parbat (8,126m) is the 9th highest peak globally. Fairy Meadows sits at the subalpine zone with pristine natural beauty.',
    ),
    'skardu-shangrila' => array(
        'title' => 'Skardu & Shangrila 6-Day Tour',
        'price' => '$850',
        'duration' => '6 Days',
        'difficulty' => 'Easy',
        'season' => 'May - September',
        'description' => 'Visit the heart of Baltistan, Upper Kachura Lake, and the majestic Deosai National Park.',
        'highlights' => array(
            'Shangrila Resort – scenic lake views',
            'Upper Kachura Lake – turquoise waters',
            'Deosai National Park – 4,272m high plains',
            'Satpara Lake & dam',
            'Local Balti culture & cuisine',
        ),
        'itinerary' => 'Day 1-2: Skardu arrival & acclimatization. Day 3: Shangrila & Kachura lakes. Day 4: Deosai plains trek. Day 5: Satpara exploration. Day 6: Return.',
        'place_info' => 'Skardu is the capital of Gilgit-Baltistan at 2,228m, surrounded by the Karakoram and Hindu Kush mountains.',
    ),
);

$treks = array(
    'rakaposhi-basecamp' => array(
        'title' => 'Rakaposhi Base Camp Trek',
        'price' => '$600',
        'duration' => '4 Days',
        'difficulty' => 'Moderate',
        'season' => 'June - September',
        'description' => 'Trek to the base camp of Rakaposhi (7,788m), the highest peak visible from a main road in the world.',
        'highlights' => array(
            'Rakaposhi peak views (7,788m)',
            'Alpine meadows & wildflowers',
            'Glacier viewpoint',
            'Remote mountain village experience',
            'High-altitude acclimatization',
        ),
        'itinerary' => 'Day 1: Approach via Karakoram Highway. Day 2: Forest trek to camp 1. Day 3: Base camp summit attempt. Day 4: Return trek.',
        'place_info' => 'Rakaposhi stands at 7,788m and is visible from the Karakoram Highway. It\'s known as the "Shilha" (killer) peak due to climatic challenges.',
    ),
    'rush-lake' => array(
        'title' => 'Rush Lake Trek (PRIORITY)',
        'price' => '$400',
        'duration' => '2-3 Days',
        'difficulty' => 'Easy-Moderate',
        'season' => 'May - September',
        'description' => 'Hidden alpine lake trek with pristine meadows, turquoise waters, and panoramic mountain views.',
        'highlights' => array(
            'Rush Lake – pristine alpine lake',
            'Rolling green meadows',
            'Wildflower blooms (June-July)',
            'Mountain bird watching',
            'Photography opportunities',
        ),
        'itinerary' => 'Day 1: Drive & trek to meadows. Day 2: Lake exploration & camping. Day 3: Return trek.',
        'place_info' => 'Rush Lake is a hidden gem in the northern valleys, sitting at approximately 3,500m elevation with untouched natural beauty.',
    ),
    'rupal-basecamp' => array(
        'title' => 'Rupal Base Camp Trek',
        'price' => '$650',
        'duration' => '5 Days',
        'difficulty' => 'Challenging',
        'season' => 'June - August',
        'description' => 'Trek to the base camp of Nanga Parbat via the legendary Rupal side, the world\'s highest mountain wall.',
        'highlights' => array(
            'Rupal Face – world\'s highest mountain wall',
            'Rupal Valley exploration',
            'Nanga Parbat views from 4,000m+',
            'Advanced trekking experience',
            'Mountain guide expertise required',
        ),
        'itinerary' => 'Day 1-2: Approach via Rupal valley. Day 3-4: Altitude gain to base camp 4,100m. Day 5: Return trek.',
        'place_info' => 'The Rupal Face of Nanga Parbat is the world\'s highest mountain wall at 4,600m vertical rise. Only for experienced mountaineers.',
    ),
);
