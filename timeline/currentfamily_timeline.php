<?php  
session_start();

// Enable error reporting for debugging (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Comprehensive array containing events by year with specific family and world milestones
$events = [
    2024 => [
        'June' => [
            [
                'type' => 'Family Event',
                'description' => 'Caitlin became a Pediatric Clinical Dietitian at Johns Hopkins All Children\'s Hospital in Saint Petersburg, Florida.'
            ]
        ],
        'August' => [
            [
                'type' => 'Family Event',
                'description' => 'Vince turned 64 on August 17.'
            ],
            [
                'type' => 'Family Event',
                'description' => 'Janice turned 85 on August 30.'
            ]
        ],
        'December' => [
            [
                'type' => 'Family Event',
                'description' => 'Kent turned 85 on December 24.'
            ],
            [
                'type' => 'Family Event',
                'description' => 'Planned family holiday gathering.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => '2024 Summer Olympics held in Paris, France.'
            ]
        ],
    ],
    2023 => [
        'May' => [
            [
                'type' => 'Family Event',
                'description' => 'Amelia graduated with an MSW from New Mexico Highlands University School of Social Work.'
            ],
            [
                'type' => 'Family Event',
                'description' => 'Caitlin graduated from The University of Alabama at Birmingham (UAB), Heersink School of Medicine.'
            ]
        ],
        'December' => [
            [
                'type' => 'World Event',
                'description' => 'Global climate strikes continue worldwide.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'NASA\'s Artemis II mission launched to return humans to the Moon.'
            ]
        ],
    ],
    2022 => [
        'July' => [
            [
                'type' => 'Family Event',
                'description' => 'Gretchen moved to Austin, Texas.'
            ]
        ],
        'August' => [
            [
                'type' => 'Family Event',
                'description' => 'Caitlin graduated from The University of Mississippi (Ole Miss), Class of 2022.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Russia invades Ukraine, leading to ongoing conflict.'
            ]
        ],
    ],
    2021 => [
        'December' => [
            [
                'type' => 'World Event',
                'description' => 'Global COVID-19 vaccine rollout began.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Suez Canal blockage caused major disruptions in global trade.'
            ]
        ],
    ],
    2020 => [
        'March' => [
            [
                'type' => 'World Event',
                'description' => 'COVID-19 pandemic declared; global lockdowns began.'
            ]
        ],
        'January' => [
            [
                'type' => 'Family Event',
                'description' => 'Chris visited Gretchen in Hawaii.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'US presidential election between Joe Biden and Donald Trump.'
            ]
        ],
    ],
    2019 => [
        'August' => [
            [
                'type' => 'Family Event',
                'description' => 'Vince turned 59 on August 17.'
            ],
            [
                'type' => 'Family Event',
                'description' => 'Janice turned 80 on August 30.'
            ]
        ],
        'December' => [
            [
                'type' => 'Family Event',
                'description' => 'Kent turned 80 on December 24.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Notre-Dame Cathedral in Paris caught fire.'
            ]
        ],
    ],
    2018 => [
        'August' => [
            [
                'type' => 'Family Event',
                'description' => 'Amelia graduated from Antioch College with a Bachelor of Arts.'
            ],
            [
                'type' => 'Family Event',
                'description' => 'Chris visited Gretchen in Hawaii.'
            ]
        ],
        'Moved' => [
            [
                'type' => 'Family Event',
                'description' => 'Amelia moved to Yellow Springs, Ohio; Boulder, Colorado; Waimea, Hawaii.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Thailand cave rescue: 12 boys and their coach trapped in a cave were successfully rescued.'
            ]
        ],
    ],
    2017 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Total solar eclipse visible across the United States on August 21.'
            ]
        ],
    ],
    2016 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Brexit referendum: UK voted to leave the European Union.'
            ]
        ],
    ],
    2015 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Paris Agreement on climate change was adopted.'
            ]
        ],
    ],
    2014 => [
        'August' => [
            [
                'type' => 'Family Event',
                'description' => 'Amelia graduated from Eagle Rock School & Professional Development Center.'
            ]
        ],
        'Moved' => [
            [
                'type' => 'Family Event',
                'description' => 'Amelia moved to Yellow Springs, Ohio; Boulder, Colorado; Waimea, Hawaii.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Ebola outbreak in West Africa declared a public health emergency.'
            ]
        ],
    ],
    2013 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Pope Francis was elected as the 266th Pope of the Catholic Church.'
            ]
        ],
    ],
    2012 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Barack Obama was re-elected as President of the United States.'
            ]
        ],
    ],
    2011 => [
        'July' => [
            [
                'type' => 'Family Event',
                'description' => 'Amelia moved to Estes Park, Colorado, and started at Eagle Rock School.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Fukushima Daiichi nuclear disaster occurred following a tsunami in Japan.'
            ]
        ],
    ],
    2010 => [
        'July' => [
            [
                'type' => 'Family Event',
                'description' => 'Chris and Melanie began their relationship.'
            ]
        ],
        'December' => [
            [
                'type' => 'Family Event',
                'description' => 'Chris married Melanie Zollner on December 22.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Deepwater Horizon oil spill occurred in the Gulf of Mexico.'
            ]
        ],
    ],
    2009 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Barack Obama was inaugurated as the 44th President of the United States.'
            ]
        ],
    ],
    2008 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Global financial crisis triggered by the collapse of Lehman Brothers.'
            ]
        ],
    ],
    2007 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Global financial crisis begins with the subprime mortgage crisis.'
            ]
        ],
    ],
    2006 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Twitter was launched.'
            ]
        ],
    ],
    2005 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'YouTube was launched.'
            ]
        ],
    ],
    2004 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Facebook was launched.'
            ]
        ],
    ],
    2003 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'The Human Genome Project was completed.'
            ]
        ],
    ],
    2002 => [
        'April' => [
            [
                'type' => 'Family Event',
                'description' => 'Cole Harber Horne was born on April 10.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Euro currency introduced in 12 European countries.'
            ]
        ],
    ],
    2001 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'September 11 attacks in the United States.'
            ]
        ],
    ],
    2000 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Y2K bug caused global concern over computer systems.'
            ]
        ],
    ],
    1999 => [
        'August' => [
            [
                'type' => 'Family Event',
                'description' => 'Callie Horne was born on August 31.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Introduction of the Euro as an accounting currency.'
            ]
        ],
    ],
    1998 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Google was founded by Larry Page and Sergey Brin.'
            ]
        ],
    ],
    1997 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Hong Kong returned to China after 99 years of British rule.'
            ]
        ],
    ],
    1996 => [
        'August' => [
            [
                'type' => 'Family Event',
                'description' => 'Caitlin Horne was born on August 17.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'The birth control pill was approved by the FDA.'
            ]
        ],
    ],
    1995 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Windows 95 launched by Microsoft.'
            ]
        ],
    ],
    1994 => [
        'August' => [
            [
                'type' => 'Family Event',
                'description' => 'Amelia Fay Horne was born on August 5 in Las Vegas, New Mexico.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Nelson Mandela elected as President of South Africa.'
            ]
        ],
    ],
    1993 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'World Trade Center bombing in New York City.'
            ]
        ],
    ],
    1992 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Barcelona hosted the Summer Olympics.'
            ]
        ],
    ],
    1991 => [
        'October' => [
            [
                'type' => 'Family Event',
                'description' => 'Gretchen Jo Horne was born on October 4 in Las Vegas, New Mexico.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Dissolution of the Soviet Union.'
            ]
        ],
    ],
    1990 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'German reunification after the fall of the Berlin Wall.'
            ]
        ],
    ],
    1989 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Fall of the Berlin Wall.'
            ]
        ],
    ],
    1988 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Pan Am Flight 103 bombing over Lockerbie, Scotland.'
            ]
        ],
    ],
    1987 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Black Monday: Stock markets around the world crashed.'
            ]
        ],
    ],
    1986 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Chernobyl disaster: A catastrophic nuclear accident in Ukraine.'
            ]
        ],
    ],
    1985 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Live Aid concerts held to raise funds for Ethiopian famine relief.'
            ]
        ],
    ],
    1984 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Indira Gandhi, Prime Minister of India, was assassinated.'
            ]
        ],
    ],
    1983 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Introduction of the first mobile phones.'
            ]
        ],
    ],
    1982 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Falklands War between the United Kingdom and Argentina.'
            ]
        ],
    ],
    1981 => [
        'May' => [
            [
                'type' => 'Family Event',
                'description' => 'Chris Horne graduated from Bismarck High School in Bismarck, North Dakota in May 1981.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Ronald Reagan inaugurated as the 40th President of the United States.'
            ]
        ],
    ],
    1980 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Mount St. Helens erupts in Washington, USA.'
            ]
        ],
    ],
    1979 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Iranian Revolution leads to the establishment of the Islamic Republic.'
            ]
        ],
    ],
    1978 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Jonestown Massacre in Guyana.'
            ]
        ],
    ],
    1977 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Apple Computer founded by Steve Jobs and Steve Wozniak.'
            ]
        ],
    ],
    1976 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'United States Bicentennial celebrated.'
            ]
        ],
    ],
    1975 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'End of the Vietnam War.'
            ]
        ],
    ],
    1974 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Resignation of U.S. President Richard Nixon following the Watergate scandal.'
            ]
        ],
    ],
    1973 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'OPEC oil embargo causes global energy crisis.'
            ]
        ],
    ],
    1972 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Apollo 17, the last manned Moon mission, launched.'
            ]
        ],
    ],
    1971 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Introduction of the microprocessor by Intel.'
            ]
        ],
    ],
    1970 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'The Beatles disband.'
            ]
        ],
    ],
    1969 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Apollo 11 mission: First humans land on the Moon.'
            ]
        ],
    ],
    1968 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Assassination of Martin Luther King Jr. and Robert F. Kennedy.'
            ]
        ],
    ],
    1967 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Summer of Love and the height of the hippie movement.'
            ]
        ],
    ],
    1966 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'United Kingdom devalued the pound sterling.'
            ]
        ],
    ],
    1965 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'United States began its major involvement in the Vietnam War.'
            ]
        ],
    ],
    1964 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Civil Rights Act signed into law in the United States.'
            ]
        ],
    ],
    1963 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Assassination of U.S. President John F. Kennedy.'
            ]
        ],
    ],
    1962 => [
        'December' => [
            [
                'type' => 'Family Event',
                'description' => 'Chris was born on December 24 in Williston, North Dakota.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Cuban Missile Crisis.'
            ]
        ],
    ],
    1961 => [
        'July' => [
            [
                'type' => 'Family Event',
                'description' => 'Jay was born on July 8 in Bismarck, North Dakota.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Yuri Gagarin became the first human in space.'
            ]
        ],
    ],
    1960 => [
        'August' => [
            [
                'type' => 'Family Event',
                'description' => 'Vince was born on August 17 in Kaiserslautern, West Germany.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'The birth control pill was approved by the FDA.'
            ]
        ],
    ],
    1959 => [
        'October' => [
            [
                'type' => 'Family Event',
                'description' => 'Kent and Janice were married on October 10 in Stanley, North Dakota.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Alaska and Hawaii became U.S. states.'
            ]
        ],
    ],
    1958 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Launch of the first successful American satellite, Explorer 1.'
            ]
        ],
    ],
    1957 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Sputnik 1, the first artificial Earth satellite, is launched by the Soviet Union.'
            ]
        ],
    ],
    1956 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Suez Crisis: Egypt nationalizes the Suez Canal.'
            ]
        ],
    ],
    1955 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Montgomery Bus Boycott begins in the United States.'
            ]
        ],
    ],
    1954 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Brown v. Board of Education: U.S. Supreme Court declares racial segregation in public schools unconstitutional.'
            ]
        ],
    ],
    1953 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Joseph Stalin dies; Nikita Khrushchev becomes the leader of the Soviet Union.'
            ]
        ],
    ],
    1952 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Queen Elizabeth II ascends to the throne of the United Kingdom.'
            ]
        ],
    ],
    1951 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'The first color television sets are sold to the public.'
            ]
        ],
    ],
    1950 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'The Korean War begins.'
            ]
        ],
    ],
    1949 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'NATO (North Atlantic Treaty Organization) is established.'
            ]
        ],
    ],
    1948 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'The World Health Organization (WHO) is founded.'
            ]
        ],
    ],
    1947 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'India gains independence from British rule.'
            ]
        ],
    ],
    1946 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'The first Cannes Film Festival is held after a hiatus due to World War II.'
            ]
        ],
    ],
    1945 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'End of World War II: Germany surrenders in May, and Japan in September after the atomic bombings of Hiroshima and Nagasaki.'
            ]
        ],
    ],
    1944 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'D-Day: Allied forces land on the beaches of Normandy, France.'
            ]
        ],
    ],
    1943 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Battle of Stalingrad ends with Soviet victory over Nazi Germany.'
            ]
        ],
    ],
    1942 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'Manhattan Project: Development of the first atomic bombs continues in the United States.'
            ]
        ],
    ],
    1941 => [
        'December' => [
            [
                'type' => 'World Event',
                'description' => 'Attack on Pearl Harbor leads the USA to enter World War II.'
            ]
        ]
    ],
    1940 => [
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'World War II continues with significant battles and developments.'
            ]
        ],
    ],
    1939 => [
        'August' => [
            [
                'type' => 'Family Event',
                'description' => 'Janice Josephine (Zarr) Horne was born on August 30 in Spokane, Washington.'
            ]
        ],
        'December' => [
            [
                'type' => 'Family Event',
                'description' => 'Kent James Horne was born on December 24 in Stanley, North Dakota.'
            ]
        ],
        'World Events' => [
            [
                'type' => 'World Event',
                'description' => 'World War II began with Germany\'s invasion of Poland.'
            ]
        ],
    ],
];

// Array containing detailed family member information
$familyMembers = [
    'Janice Josephine (Zarr) Horne' => [
        'Birthdate' => 'August 30, 1939',
        'Birth Order' => 'First',
        'Astrological Sign' => 'Virgo',
        'Telephone' => '6054312721', // Added Telephone Number
        'Education' => [
            // Add education details if available
        ],
        'Additional Info' => 'Born in Spokane, Washington.'
    ],
    'Kent James Horne' => [
        'Birthdate' => 'December 24, 1939',
        'Birth Order' => 'Second',
        'Astrological Sign' => 'Capricorn',
        'Telephone' => '6054310247', // Added Telephone Number
        'Education' => [
            // Add education details if available
        ],
        'Additional Info' => 'Born in Stanley, North Dakota.'
    ],
    'Vince Horne' => [
        'Birthdate' => 'August 17, 1960',
        'Birth Order' => 'Third',
        'Astrological Sign' => 'Leo',
        'Telephone' => '6054314865', // Added Telephone Number
        'Education' => [
            // Add education details if available
        ],
        'Additional Info' => 'Born in Kaiserslautern, West Germany.'
    ],
    'Jay Horne' => [
        'Birthdate' => 'July 8, 1961',
        'Birth Order' => 'Fourth',
        'Astrological Sign' => 'Cancer',
        'Telephone' => '7404314770', // Added Telephone Number
        'Education' => [
            // Add education details if available
        ],
        'Additional Info' => 'Born in Bismarck, North Dakota.'
    ],
    'Chris Horne' => [
        'Birthdate' => 'December 24, 1962',
        'Birth Order' => 'Fifth',
        'Astrological Sign' => 'Capricorn',
        'Telephone' => '5054540201', // Added Telephone Number
        'Education' => [
            'Graduated from Bismarck High School in May 1981.',
            // Add other education details if available
        ],
        'Additional Info' => 'Born in Williston, North Dakota.'
    ],
    'Gretchen Jo Horne' => [
        'Birthdate' => 'October 4, 1991',
        'Birth Order' => 'Sixth',
        'Astrological Sign' => 'Libra',
        'Telephone' => '8083156096', // Added Telephone Number
        'Education' => [
            'Eagle Rock School & Professional Development Center, Class of 2012'
        ],
        'Current Residence' => 'Austin, Texas (since July 2022)',
        'Additional Info' => 'Moved to Austin for career opportunities.'
    ],
    'Amelia Fay Horne' => [
        'Birthdate' => 'August 5, 1994',
        'Birth Order' => 'Seventh',
        'Astrological Sign' => 'Leo',
        'Telephone' => '5054292863', // Added Telephone Number
        'Education' => [
            'Eagle Rock School & Professional Development Center, Class of 2014',
            'Bachelor’s: Antioch College, Class of 2018',
            'Master’s: New Mexico Highlands University School of Social Work, Class of 2023'
        ],
        'Places Lived' => [
            'Las Vegas, New Mexico (Hometown)',
            'Yellow Springs, Ohio',
            'Boulder, Colorado',
            'Waimea, Hawaii',
            'Estes Park, Colorado'
        ],
        'Additional Info' => 'Involved in social work and community development.'
    ],
    'Caitlin Horne' => [
        'Birthdate' => 'August 17, 1996',
        'Birth Order' => 'Eighth',
        'Astrological Sign' => 'Leo',
        'Telephone' => '7402504339', // Added Telephone Number
        'Education' => [
            'James Clemens High School, Class of 2015',
            'Bachelor’s: The University of Mississippi (Ole Miss), Class of 2022',
            'Master’s: The University of Alabama at Birmingham (UAB), Class of 2023'
        ],
        'Current Role' => 'Pediatric Clinical Dietitian at Johns Hopkins All Children’s Hospital, Florida',
        'Additional Info' => 'Moved to various locations for education and career advancement.'
    ],
    'Callie Horne' => [
        'Birthdate' => 'August 31, 1999',
        'Birth Order' => 'Ninth',
        'Astrological Sign' => 'Virgo',
        'Telephone' => '7402504763', // Added Telephone Number
        'Education' => [
            // Add education details if available
        ],
        'Additional Info' => 'Born in Las Vegas, New Mexico.'
    ],
    'Cole Harber Horne' => [
        'Birthdate' => 'April 10, 2002',
        'Birth Order' => 'Tenth',
        'Astrological Sign' => 'Aries',
        'Telephone' => '5056170214', // Added Telephone Number
        'Education' => [
            // Add education details if available
        ],
        'Additional Info' => 'Born in Las Vegas, New Mexico.'
    ],
    // Removed 'Melanie Zollner' as per request
];

// Function to map zodiac signs based on birthdates
function get_zodiac_sign($day, $month) {
    $zodiac = '';

    if (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) {
        $zodiac = 'Aquarius';
    } elseif (($month == 2 && $day >= 19) || ($month == 3 && $day <= 20)) {
        $zodiac = 'Pisces';
    } elseif (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
        $zodiac = 'Aries';
    } elseif (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
        $zodiac = 'Taurus';
    } elseif (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20)) {
        $zodiac = 'Gemini';
    } elseif (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22)) {
        $zodiac = 'Cancer';
    } elseif (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
        $zodiac = 'Leo';
    } elseif (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
        $zodiac = 'Virgo';
    } elseif (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22)) {
        $zodiac = 'Libra';
    } elseif (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) {
        $zodiac = 'Scorpio';
    } elseif (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) {
        $zodiac = 'Sagittarius';
    } elseif (($month == 12 && $day >= 22) || ($month == 1 && $day <= 19)) {
        $zodiac = 'Capricorn';
    }

    return $zodiac;
}

// Update zodiac signs dynamically (optional)
foreach ($familyMembers as $name => &$details) {
    if (isset($details['Birthdate'])) {
        $birthdate = DateTime::createFromFormat('F j, Y', $details['Birthdate']);
        if ($birthdate) {
            $day = (int)$birthdate->format('j');
            $month = (int)$birthdate->format('n');
            $details['Astrological Sign'] = get_zodiac_sign($day, $month);
        }
    }
}
unset($details); // Break the reference

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Timeline</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <!-- Inline styles removed -->
</head>
<body>
    <header>
        <div class="logo">
            <img src="../images/hhelmet2.png" alt="Viking Helmet Icon" class="icon">
            <h1>Family Timeline</h1>
        </div>
        <nav>
            <a href="../landing_page.php" class="landing-link">Return to Landing Page</a>
        </nav>
    </header>

    <main>
        <section class="timeline">
            <h2>Timeline of Key Family and World Events</h2>
            <?php 
            // Sort years in descending order
            krsort($events);
            foreach ($events as $year => $details): ?>
                <button class="collapsible"><?php echo htmlspecialchars($year); ?></button>
                <div class="content">
                    <?php 
                    foreach ($details as $month => $eventsList): 
                        if ($month === 'World Events') {
                            echo '<h3>World Events</h3>';
                        } else {
                            echo '<h3>' . htmlspecialchars($month) . '</h3>';
                        }
                        foreach ($eventsList as $event): ?>
                            <p><strong><?php echo htmlspecialchars($event['type']); ?>:</strong> <?php echo htmlspecialchars($event['description']); ?></p>
                    <?php endforeach; 
                    endforeach; ?>
                </div>
            <?php endforeach; ?>
        </section>

        <section class="family-members">
            <h2>Family Members</h2>
            <?php foreach ($familyMembers as $name => $details): ?>
                <div class="family-member">
                    <h3><?php echo htmlspecialchars($name); ?></h3>
                    <?php if (isset($details['Birthdate'])): ?>
                        <p><strong>Birthdate:</strong> <?php echo htmlspecialchars($details['Birthdate']); ?></p>
                    <?php endif; ?>
                    <?php if (isset($details['Birth Order'])): ?>
                        <p><strong>Birth Order:</strong> <?php echo htmlspecialchars($details['Birth Order']); ?></p>
                    <?php endif; ?>
                    <?php if (isset($details['Astrological Sign'])): ?>
                        <p><strong>Astrological Sign:</strong> <?php echo htmlspecialchars($details['Astrological Sign']); ?></p>
                    <?php endif; ?>
                    <?php if (isset($details['Education'])): ?>
                        <p><strong>Education:</strong></p>
                        <ul>
                            <?php foreach ($details['Education'] as $edu): ?>
                                <li><?php echo htmlspecialchars($edu); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if (isset($details['Current Role'])): ?>
                        <p><strong>Current Role:</strong> <?php echo htmlspecialchars($details['Current Role']); ?></p>
                    <?php endif; ?>
                    <?php if (isset($details['Places Lived'])): ?>
                        <p><strong>Places Lived:</strong></p>
                        <ul>
                            <?php foreach ($details['Places Lived'] as $place): ?>
                                <li><?php echo htmlspecialchars($place); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if (isset($details['Current Residence'])): ?>
                        <p><strong>Current Residence:</strong> <?php echo htmlspecialchars($details['Current Residence']); ?></p>
                    <?php endif; ?>
                    <?php if (isset($details['Additional Info'])): ?>
                        <p><strong>Additional Info:</strong> <?php echo htmlspecialchars($details['Additional Info']); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Horne Family Heritage | All rights reserved</p>
    </footer>

    <script>
        // Collapsible functionality
        document.addEventListener('DOMContentLoaded', function () {
            const collapsibles = document.querySelectorAll('.collapsible');
            collapsibles.forEach(button => {
                button.addEventListener('click', function () {
                    this.classList.toggle('active');
                    const content = this.nextElementSibling;
                    if (content.style.display === "block") {
                        content.style.display = "none";
                    } else {
                        content.style.display = "block";
                    }
                });
            });
        });
    </script>
</body>
</html>
