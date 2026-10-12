<?php
/* =====================================================================
 * BLOG DATA  (blog.php aur blog-details.php dono isse use karte hain)
 *
 * $posts       = listing rows (same format jo blog.php mein tha)
 *                [slug, title, tag, excerpt, date (Y-m-d), read time (min)]
 * $blogBodies  = article ka poora content, slug ke hisaab se.
 *                Block types:
 *                  ['h2',   'Heading']
 *                  ['p',    'Paragraph']
 *                  ['ul',   ['Point 1', 'Point 2']]
 *                  ['quote','Quote text']
 *                  ['note', 'Key takeaway text']
 *                Jis post ka body yahan nahi hoga, uske liye details page par
 *                "article is being prepared" message dikhega.
 * ===================================================================== */

$posts = [
    [
        'choosing-an-advanced-training-pathway-in-aesthetic-medicine',
        'Choosing an Advanced Training Pathway in Aesthetic Medicine',
        'Aesthetic Medicine',
        'What to look for in a program: scientific foundations, specialist demonstrations, case-based learning and a clear focus on patient selection and safety.',
        '2026-10-02',
        6
    ],
    [
        'why-responsible-clinical-education-begins-with-safety',
        'Why Responsible Clinical Education Begins with Safety',
        'Patient Safety',
        'Patient assessment, informed consent, infection prevention and complication awareness.',
        '2026-09-26',
        5
    ],
    [
        'learning-in-india-what-international-doctors-can-expect',
        'Learning in India: What International Doctors Can Expect',
        'International',
        'Specialist-led lectures, clinical demonstrations, workshops and observational learning.',
        '2026-09-19',
        5
    ],
    [
        'understanding-laser-and-energy-based-devices',
        'Understanding Laser and Energy-Based Devices',
        'Laser & Energy',
        'A clear introduction to how energy-based devices work, and why parameters and safety matter.',
        '2026-09-12',
        7
    ],
    [
        'patient-selection-and-informed-consent',
        'Patient Selection and Informed Consent in Practice',
        'Patient Safety',
        'Why careful selection and a transparent consent conversation are central to responsible care.',
        '2026-09-05',
        4
    ],
    [
        'hair-restoration-assessment-basics',
        'Hair Restoration: The Basics of Assessment',
        'Aesthetic Medicine',
        'How a structured assessment shapes planning and expectations in hair restoration.',
        '2026-08-29',
        6
    ],
    [
        'infection-prevention-in-the-procedure-room',
        'Infection Prevention in the Procedure Room',
        'Nursing & OT',
        'Everyday habits and protocols that keep procedure rooms and operation theatres safe.',
        '2026-08-22',
        5
    ],
    [
        'why-case-based-learning-matters',
        'Why Case-Based Learning Matters',
        'Clinical Education',
        'How discussing real clinical cases builds judgement beyond textbook knowledge.',
        '2026-08-15',
        4
    ],
    [
        'the-role-of-the-surgical-assistant',
        'The Role of the Surgical Assistant',
        'Nursing & OT',
        'What good surgical assistance looks like before, during and after a procedure.',
        '2026-08-08',
        5
    ],
    [
        'colour-theory-for-medical-pmu',
        'Colour Theory for Medical PMU',
        'PMU',
        'Undertones, pigment behaviour and colour matching explained for restorative work.',
        '2026-08-01',
        6
    ],
    [
        'an-introduction-to-endourology',
        'An Introduction to Endourology',
        'Surgery',
        'A beginner-friendly overview of endoscopic urology and the techniques involved.',
        '2026-07-25',
        7
    ],
    [
        'continuous-learning-in-modern-medicine',
        'Continuous Learning in Modern Medicine',
        'Clinical Education',
        'Why professional development is an ongoing journey rather than a one-time training.',
        '2026-07-18',
        4
    ],
    [
        'how-international-collaboration-strengthens-education',
        'How International Collaboration Strengthens Medical Education',
        'International',
        'Knowledge exchange across borders brings new perspectives to clinical practice.',
        '2026-07-11',
        5
    ],
    [
        'medical-nutrition-and-weight-management-overview',
        'Medical Nutrition and Weight Management: An Overview',
        'Clinical Education',
        'Clinical nutrition, metabolic health and structured approaches to weight management.',
        '2026-07-04',
        6
    ],
];

/* ---------- ARTICLE BODIES (sample content - apna content daalo) ---------- */
$blogBodies = [

    'choosing-an-advanced-training-pathway-in-aesthetic-medicine' => [
        ['p', 'Aesthetic medicine is evolving quickly, and so are the programs that teach it. For a practising doctor, the challenge is rarely finding a course. It is finding one that builds real clinical judgement instead of only demonstrating a technique.'],
        ['h2', 'Start with the scientific foundations'],
        ['p', 'A good pathway begins with anatomy, skin biology, product and device science, and the reasoning behind each treatment option. Learners who understand why a treatment works are better prepared to adapt it to the patient in front of them.'],
        ['h2', 'Look for specialist-led teaching'],
        ['p', 'Education led by practising specialists connects theory to day-to-day clinical reality. Faculty who treat patients themselves can explain not only the ideal result, but also the problems that appear in real practice and how to respond.'],
        ['h2', 'Value case-based learning'],
        ['p', 'Discussing real cases, including difficult ones, builds the judgement that no slide deck can. Case discussions teach you to weigh options, set realistic expectations and decide when not to treat.'],
        ['quote', 'A program that teaches only the procedure is training hands. A program that teaches the decision is training clinicians.'],
        ['h2', 'Expect a clear focus on safety'],
        ['p', 'Patient selection, informed consent, infection prevention and complication awareness should be part of the core curriculum, not an afterthought at the end of a workshop.'],
        ['h2', 'Questions to ask before you enrol'],
        ['ul', [
            'Who teaches the program, and do they practise in the field?',
            'How much of the learning is demonstration, discussion and supervised practice?',
            'How are patient selection and complications covered?',
            'What support is available after the program ends?',
        ]],
        ['note', 'Choose a pathway for the depth of its thinking, not the length of its technique list.'],
    ],

    'why-responsible-clinical-education-begins-with-safety' => [
        ['p', 'Every clinical skill carries a responsibility. Education that treats safety as a core subject, taught from the first session, produces practitioners who think about the patient before they think about the procedure.'],
        ['h2', 'Patient assessment comes first'],
        ['p', 'A careful history and examination decide whether a treatment is appropriate at all. Learners should practise structured assessment until it becomes routine.'],
        ['h2', 'Informed consent is a conversation'],
        ['p', 'Consent is more than a signed form. It means explaining benefits, limitations, alternatives and possible complications in plain language, and making sure the patient has understood.'],
        ['h2', 'Infection prevention is a daily habit'],
        ['p', 'Hand hygiene, aseptic technique, sterilisation and clean handling of equipment protect patients and staff alike. These habits are best learned through repetition and supervision.'],
        ['h2', 'Be ready for complications'],
        ['ul', [
            'Know the common complications of each procedure.',
            'Recognise early warning signs.',
            'Understand your escalation and referral pathway.',
            'Document clearly and follow up with the patient.',
        ]],
        ['note', 'Safety is not a module to complete. It is the way a clinician thinks.'],
    ],

    'learning-in-india-what-international-doctors-can-expect' => [
        ['p', 'India offers a large and varied clinical environment, and many international doctors look to learn alongside experienced Indian specialists. Here is what a typical learning experience can include, depending on the individual program.'],
        ['h2', 'Specialist-led lectures'],
        ['p', 'Academic sessions led by practising specialists cover scientific foundations, contemporary approaches and current clinical thinking.'],
        ['h2', 'Clinical demonstrations'],
        ['p', 'Demonstrations show how experienced practitioners plan and carry out treatment, with time set aside for questions and discussion.'],
        ['h2', 'Case-based learning and workshops'],
        ['p', 'Case discussions and focused workshops help you compare approaches and apply what you learn in your own practice setting.'],
        ['h2', 'Practical and observational components'],
        ['p', 'Some programs include practical or observational learning. The exact format depends on the program and the regulations that apply to visiting professionals, so it is best to confirm details before you travel.'],
        ['h2', 'Before you apply'],
        ['ul', [
            'Confirm the program format and duration.',
            'Check visa and professional requirements for your country.',
            'Ask what is observational and what is hands-on.',
            'Plan travel and stay well in advance.',
        ]],
        ['note', 'Share your country and area of interest with our team and we will guide you to the right program.'],
    ],
];