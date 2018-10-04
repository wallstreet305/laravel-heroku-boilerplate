<?php

use Illuminate\Database\Seeder;

class FaqQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq_questions')->insert(
            [
                'question_id' => 1,
                'category_id_fk' => 1,
                'question_text' => "What can i expect to happen at my first ante-natal appointment with my GP?",
                'answer_text' => "~ Your first visit with your GP is exciting and you can expect the following will happen at your first ante-natal visit. Most GPs prefer you to book a long consultation as it can be quite lengthy and you may have many questions.  It may include the following: ~ \n "
                                    ."|| A urine test may be performed to confirm your pregnancy if you have not already done one (or several). A pregnancy blood test is usually not done as the urine tests are accurate. \n "
                                    ."|| A medical history review if you are seeing your GP for the first time. \n "
                                    ."|| Limited physical examination, but weight and blood pressure are usually important things at this visit to establish a baseline. \n "
                                    ."|| A blood test and urine test will be ordered.  In all pregnancies GPs will check for conditions such as anaemia, existing infections, antibodies for some vaccine preventable infections and your blood group. \n "
                                    ."|| A cervical screen (previously called a PAP smear), if you are due (another consult may need to be made for this).  They are quite safe to be performed in pregnancy. \n "
                                    ."|| A discussion about diet and lifestyle while you are pregnant.  Keep a list of questions you might have about your pregnancy. \n "
                                    ."|| Your GP will also discuss the options you have for management of your pregnancy. \n "
                                    ."|| The GP may also discuss some screening tests, but it depends on how far along you already are in your pregnancy. \n "
                                    ."|| You may, or may not, be advised to have a dating scan depending on how certain your dates are (how regular your periods have been). \n "
                                    ."|| You will be given a booking number to ring (if you are in the city - rural locations have other processes).  This will inform the hospital where you will deliver your baby that you will be proceeding with Pregnancy Shared care with your GP. \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('faq_questions')->insert(
            [
                'question_id' => 2,
                'category_id_fk' => 1,
                'question_text' => 'What is the telephone number of the SA Pregnancy Info-line?',
                'answer_text' => "~ 1300 368 820 ~ \n ",

                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 3,
                'category_id_fk' => 1,
                'question_text' => 'Where are the Public Hospitals located in Adelaide?',
                'answer_text' => " ** The Women's and Children's Hospital – ** ~ 72 King William Street, North Adelaide SA ~ \n "
                                    ."** Flinders Medical Centre – ** ~ Flinders Drive, Bedford Park SA ~ \n "
                                    ."** Lyell McEwin Health Service – ** ~ Haydown Road, Elizabeth Vale SA ~ \n "
                                    ."** Gawler Health Service – ** ~ Hutchinson Road, Gawler East SA ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 4,
                'category_id_fk' => 2,
                'question_text' => 'What is an amniocentesis?',
                'answer_text' => " ~ An amniocentesis is a medical procedure performed to sample the fluid around the baby in the uterus (womb). The fluid is collected using a special needle inserted through the pregnant women's abdomen. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 5,
                'category_id_fk' => 2,
                'question_text' => 'Why would an amniocentesis be performed?',
                'answer_text' => " ~ The most common reason is to test for Dow Syndrome or other chromosome or genetic conditions. The test is often offered because of a suspected chromosome or genetic condition found on ultrasound or other screening investigation. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 6,
                'category_id_fk' => 2,
                'question_text' => 'Does it hurt?',
                'answer_text' => "~ The pain from an amniocentesis needle is like having a blood test from your arm. Sometimes you may suffer with cramping pains or period-like pain. Most women will not require any pain relief following the procedure. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 7,
                'category_id_fk' => 2,
                'question_text' => 'Are there any risks?',
                'answer_text' => " ~ There is a small risk of miscarriage in any pregnancy and having an amniocentesis may increase the over-all risk. The estimated risk of miscarriage due to an amniocentesis is less than 1in 200. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 8,
                'category_id_fk' => 2,
                'question_text' => 'What tests can I expect at my first ante-natal visit?',
                'answer_text' => " ~ There are quite a few investigations that your GP will offer at your initial consultation. Blood group, antibody screen, full blood examination, Rubella status, Hepatitis B and C screens, Syphilis screen, HIV screening as well as urine may be collected to exclude infection. You will be given accurate information and explanation about these tests by your GP and you will be given the results of these investigations at your next ante-natal visit. If there are any problems discovered you will be contacted by your GP as soon as possible to discuss. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 9,
                'category_id_fk' => 2,
                'question_text' => 'What else can I expect at my ante-natal visits?',
                'answer_text' => " ~ From approximately 24 weeks your ante-natal visits will become more frequent. At each visit your GP will check the well-being of both you and your baby. You will have an examination to check both the size and position of the baby at each visit. Your GP will also listen to the baby's heart beat and check your blood pressure at every visit. Further blood and urine tests are usually required at 26-28 weeks, when you will be offered at test for gestational diabetes and another full blood examination. A further full blood examination is usually offered again at 36 weeks. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 10,
                'category_id_fk' => 2,
                'question_text' => 'When do I have an Ultrasound Scan?',
                'answer_text' => " ~ Most women will have at least two ultrasound scans performed during their pregnancy. An ultrasound scan may be arranged at your first ante-natal visit to confirm your dates. You will be offered an ultrasound scan at around 18 weeks called a morphology scan. This is a detailed ultrasound that will closely look at your baby's body as well as check the position of the placenta, the umbilical cord, the amount of amniotic fluid, your uterus and the cervix. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 11,
                'category_id_fk' => 2,
                'question_text' => 'What are screening tests?',
                'answer_text' => " ~ The principle of screening is to offer a safe, accessible test to identify women with an increased chance of having a baby affected by a chromosomal or genetic condition. These women with an increased chance are offered genetic counseling and follow up diagnostic testing with appropriate discussion with your GP. It is very important to understand that a screening test does not tell you for certain if your baby has the condition, only if there is an increased chance.  Screening tests may also miss some babies that have the condition.  Your GP should explain the results of your screening test to you and refer you to a genetic counselor if required. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 12,
                'category_id_fk' => 2,
                'question_text' => 'What are screening tests?',
                'answer_text' => " ~ The principle of screening is to offer a safe, accessible test to identify women with an increased chance of having a baby affected by a chromosomal or genetic condition. These women with an increased chance are offered genetic counseling and follow up diagnostic testing with appropriate discussion with your GP. It is very important to understand that a screening test does not tell you for certain if your baby has the condition, only if there is an increased chance.  Screening tests may also miss some babies that have the condition.  Your GP should explain the results of your screening test to you and refer you to a genetic counselor if required. ~ \n "
                                    ." ** 1. Combined first trimester screening ** \n "
                                    ." ~ This screening test involves an ultrasound at 11 to 13 weeks and a blood test between 10 and 13 weeks. The ultrasound measurement of the back of the baby's neck (nuchal translucency) is combined with the results of the blood test and your age to estimate the chance of the baby having Down syndrome. ~ \n "
                                    ." ** 2. Non-Invasive Pre-Natal Testing (NIPT) ** \n "
                                    ." ~ Cell-free DNA screening, or non-invasive prenatal testing (NIPT), uses a sample of your blood to estimate the chance of your baby having a chromosomal condition such as Down syndrome.  It can identify about 99% of babies with Down syndrome, and can also test for other chromosomal conditions. An 11–13 week ultrasound is not included with this test and has to be arranged separately if you decide to have one. ~ \n "
                                    ." ** 3. Second Trimester Serum Screening ** \n "
                                    ." ~ This blood test can be performed between 15 and 20 weeks of pregnancy. It can detect approximately 75% of pregnancies with Down syndrome. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 13,
                'category_id_fk' => 3,
                'question_text' => 'Can I travel by air?',
                'answer_text' => " ~ The airlines will have restrictions concerning air travel so it is always best to check with them first. ~ \n "
                                    ." \n ~ Most domestic airlines in Australia will not permit a pregnant woman to travel for more than 4 hours after 36 weeks of her pregnancy. International travel may be restricted after 32 weeks. Some airlines will ask you for a letter from your Doctor to stay that you are fit for air travel. This letter will confirm your due date and whether there are any complications in your pregnancy. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 14,
                'category_id_fk' => 3,
                'question_text' => 'Can I travel by car?',
                'answer_text' => " ~ Most long and tiring journeys are discouraged during your pregnancy unless necessary. If you do need to travel in a car for a long period of time it is important that you have frequent stops, every 2 hours to stretch your legs. You will need to wear your seat belt and make sure this is comfortable around your hips and under your pregnant belly. The should strap should be above your belly and between your breasts. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 15,
                'category_id_fk' => 3,
                'question_text' => 'Can I go on a cruise?',
                'answer_text' => " ~ Generally, travel by sea is safe. However most cruise liners restrict travel after 28 weeks. It is important to check prior to making any bookings. Sea travel can trigger nausea and vomiting. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 16,
                'category_id_fk' => 3,
                'question_text' => 'Useful website',
                'answer_text' => " @ www.traveldoctor.com.au @ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 17,
                'category_id_fk' => 4,
                'question_text' => 'How much weight should I be gaining?',
                'answer_text' => " ~ Weight is a sensitive subject for most women. ~ \n "
                                    ." ~ It is recommended that you should try and reach a healthy weight before you become pregnant. ~ \n "
                                    ." ~ Most women gain around 10 to 15 kilos across the whole pregnancy.  Obese women should ideally aim for minimal or no gain. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 18,
                'category_id_fk' => 4,
                'question_text' => 'How important is it to take vitamins during pregnancy?',
                'answer_text' => " ~ Expensive pregnancy vitamins are not vital if you are eating a balanced diet.  The current evidence recommends Folic Acid and Iodine as the minimum supplementation for all pregnant women in Australia, and preferably to start before pregnancy. If not from the start, as early as possible in the first trimester. ~ \n "
                                    ." ~ Calcium, Vitamin D or Iron may be recommended depending on your history and initial test results. ~ \n "
                                    ." ~ If you have chosen to take a complete pregnancy vitamin this is ok especially if your diet is inadequate. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 19,
                'category_id_fk' => 4,
                'question_text' => 'What can I take for morning sickness?',
                'answer_text' => " ~ If you want to avoid taking prescription medication for morning sickness, there are some commonly used methods to alleviate nausea: ~ \n "
                                    ."~ Dry crackers ~ \n "
                                    ."~ Ginger - in its many forms: tea, tablets, ginger ale ~ \n "
                                    ."~ B group vitamins ~ \n "
                                    ."~ Regular small meals ~ \n "
                                    ."~ Talk to your doctor if your nausea continues despite trying these simple methods. There are some safe prescription medications that may help. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 20,
                'category_id_fk' => 4,
                'question_text' => 'What can I do to about heartburn (reflux)?',
                'answer_text' => "~ Heartburn is very common in pregnancy due to a growing uterus and progesterone, a hormone that relaxes muscles (including the stomach valve).  This is a clever process the body goes through to ready the body to stretch more easily for pregnancy and birth. Unfortunately, acid passing through the now relaxed stomach valve can be bothersome. ~ \n "
                                    ."~ You can try these following things: ~ \n "
                                    ." || Eating smaller and more frequent meals \n "
                                    ." || Taking a walk after meals \n "
                                    ." || Keeping the head and chest elevated while you sleep \n "
                                    ." || Ginger tea / tablets / drinks \n "
                                    ." || Taking over the counter antacids to alleviate indigestion. \n "
                                    ."~ If your heartburn is not responding to these methods that you can buy over the counter at the pharmacy talk to your GP as there as some safe prescription medications that may be able to help that you can discuss. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 21,
                'category_id_fk' => 4,
                'question_text' => 'Is it safe to have Sex during my pregnancy?',
                'answer_text' => "~ Yes, sex is perfectly safe in pregnancy. Intercourse will not harm your baby. The amniotic sac, the uterus, and the mucus plug in the cervix all provide an excellent buffer between activities and your baby. However, there are some instances where your GP may tell you to abstain from allowing anything into the vagina altogether. This may happen if you have problems with your cervix putting you at risk premature labour, or if you suffer from placenta previa (the placenta is too close to the cervix) and some other rarer conditions. Non- penetrative forms of sexual play are usually still ok even with complications, so don't be afraid to clarify exactly what you can and can't do with your GP. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 22,
                'category_id_fk' => 4,
                'question_text' => 'How can I prevent stretch marks?',
                'answer_text' => "~ Approximately 90 percent of pregnant women develop stretch marks as their body grows and changes during pregnancy and often it is genetically based. Massaging your skin daily with a moisturizer or oil may help a little in preventing stretch marks.  It helps prevent skin from drying and increase circulation and tissue repair. ~ \n "
                                    ."~ Not gaining excessive amounts of weight during pregnancy can also limit stretch marks. ~ \n "
                                    ."~ Remember, stretch marks are quite genetic so if your mother has them you may just be destined to get them also. Don’t worry if they look impressive initially they become pale over time. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 23,
                'category_id_fk' => 4,
                'question_text' => 'Is Exercise safe for pregnant women?',
                'answer_text' => "~ It is totally safe, even protective, to exercise during your pregnancy. There are ways to stay active, fit, and safe, unless your GP advises otherwise.  If you are new to exercise, gentle, low impact exercise—such as low gravity swimming, aqua aerobics, walking, yoga, Pilates, tai chi, and dance are all totally safe. Contact sports that pose fall, collision, or injury risks are best avoided once you start to “show” but while your uterus is small it is protected by the pelvis. It is safe to jog/run if you are already doing so before pregnancy but it is generally suggested not to start up new high impact exercise the body is not used to. Elevated body temperature is what poses the risk, not the exercise itself. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 24,
                'category_id_fk' => 4,
                'question_text' => 'Gestational diabetes?',
                'answer_text' => "~ Routine tests for gestational diabetes are carried out at 28 weeks for all pregnant women.  You may require to be screened earlier if you have particular risk factors, some of which include: ethnicity, obesity, previous delivery of a large baby, history of gestational diabetes with another pregnancy. ~ \n "
                                    ."~ Ask your GP what your risk is at your first visit. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 25,
                'category_id_fk' => 4,
                'question_text' => "Is there anything I shouldn't eat when pregnant?",
                'answer_text' => "~ Australia's food supply is generally very safe. ~ \n "
                                    ."~ Limit (not totally avoid) fish with higher levels of mercury (very large fish that eat smaller fish). ~ \n "
                                    ."~  Avoid soft cheeses - and any other products that are unpasteurized. ~ \n "
                                    ."~ Avoid rare meat. ~ \n "
                                    ."~ Undercooked eggs are also best to be avoided - but the jury is out on whether runny egg yolks in fried eggs are an issue. ~ \n "
                                    ."~ Self-serve salad bars are best avoided due to the numbers of people handling the food and the length of time it is exposed to the environment. ~\n "
                                    ."~ Soft serve ice cream from machines - the safety is entirely dependent on how long before they are cleaned. ~\n "
                                    ."~ If you are not sure whether you should avoid a food remember to discuss this with your GP. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 26,
                'category_id_fk' => 4,
                'question_text' => 'What can I do if I feel anxious or sad during my pregnancy?',
                'answer_text' => "~ It can be difficult to admit to yourself that you are struggling with anxiousness or depression and then to tell someone else. There can often be a sense of relief to discuss this however with your partner and your GP. ~ \n "
                                ."~ It is much better for you and your baby to put your hand up and ask for help at this time. ~ \n "
                                ."~ You will find that during your pregnancy you will be asked to complete a questionnaire called the Edinburgh post-natal depression scale (EPNS). This can help your GP identify if you need further treatment for depression and or anxiety. ~\n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 27,
                'category_id_fk' => 4,
                'question_text' => 'What is a birth plan?',
                'answer_text' => "~ A birth plan is a written summary of your preferences for when you are in labour and giving birth. It can include things like what position you want to give birth in, what pain relief you prefer (if you need it) and who you would like to be with you at the birth. ~ \n "
                                ."~ A birth plan can be a good way to communicate with your GP about what is important to you before the birth. It gives them information about your preferences during labour and what you would like to avoid, where possible. ~ \n "
                                ."~ Because you cannot control every aspect of labour and the birth, it is therefore best to be flexible in your planning in case something does not go as planned. ~ \n "
                                ."~ Every woman's birth plan will be different because what goes in it depends on what’s important to you. Your birth plan should be discussed well in advance of giving birth with your GP. The birth plan can also be called a set of birth wishes or birth intentions. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 28,
                'category_id_fk' => 4,
                'question_text' => 'Can I prepare for breast feeding during my pregnancy?',
                'answer_text' => "~ Yes. Learning about breastfeeding before baby is born (when you have more time to take in the information and seek answers to your questions) can be the first step to helping you to reach your breast-feeding goals. For some mums, it can be quite overwhelming to start learning the basics of breast-feeding during the period when both mother and baby are recovering from the birth. ~ \n "
                    ." ** Colostrum ** \n "
                    ."~ From about the 16th week of pregnancy, a mother's breasts begin to make colostrum. ~ \n "
                    ."~ Ante-natal expressing of colostrum is the hand expression and collection of colostrum during pregnancy. Expressed colostrum is collected and frozen and used to feed a baby after birth, if required. ~ \n "
                    ."~ If you are considering expressing colostrum antenatally discuss this with your GP. ~ \n "
                    ."~ There is wide variation in the amount of colostrum different women express ante-natally ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            array(
                'question_id' => 29,
                'category_id_fk' => 4,
                'question_text' => 'Why is breastfeeding important?',
                'answer_text' => "~ Breastmilk is the normal food for babies, designed by nature for human infants: ~ \n "
                    ." || It is a complete food containing all your baby's nutritional needs for the first 6 months of life.  \n "
                    ." || It satisfies both hunger and thirst; extra water is not needed.  \n "
                    ." || # It increases a baby's resistance to infection and disease # @ https://www.breastfeeding.asn.au/bfinfo/health-outcomes-associated-infant-feeding @  \n\n "
                    ."~ Breastfeeding is important for mothers too. ~ \n "
                    ." || It's convenient, cheap and always there when you need it. \n "
                    ." || It's always fresh, clean and safe.  \n "
                    ." || It quickly soothes a fussy, unhappy baby. \n "
                    ." || It helps your uterus return to its normal size after childbirth. \n "
                    ." || It gives you a chance to sit down during the day and rest.  \n "
                    ." || # Mothers who don't breastfeed have increased risks of cancer of the breast and ovaries. # @ https://www.breastfeeding.asn.au/bfinfo/health-outcomes-associated-infant-feeding @ \n "
                    ." || Breastfeeding helps create a close and loving bond between you and your baby and can be a deeply satisfying experience for you both. \n ",
                'created_at' => now(),
                'updated_at' => now()
            )
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 30,
                'category_id_fk' => 4,
                'question_text' => 'How soon after birth can I start to breastfeed?',
                'answer_text' => "~ Most babies have a strong need to suck when they are first born, so if you are both well you can start straight away ~ \n "
                                    ." ** Choosing a maternity bra ** \n "
                                    ."~ There are many different styles of maternity or nursing bras available and it can be confusing deciding which one to buy. ~ \n "
                                    ."~ The wearing of a bra during pregnancy or breastfeeding is a matter of personal choice. However, women (particularly who have larger breasts) may be more comfortable wearing a bra. ~ \n "
                                    ."~ A correctly fitted bra gives you comfort and support, so it is a good idea to be professionally fitted. It is not necessary to buy a bra you will grow into - indeed too big can be as bad as too small. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 31,
                'category_id_fk' => 4,
                'question_text' => 'Should I wear a bra to bed?',
                'answer_text' => "~ The decision to wear a bra to bed depends entirely on your personal preference. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 32,
                'category_id_fk' => 4,
                'question_text' => 'How long should I continue to work?',
                'answer_text' => "~ An employee can't be discriminated against because she's pregnant. This means that an employee can't be fired, demoted or treated differently to other employees because she's pregnant. ~ \n "
                                ."~ If a pregnant employee wants to work in the 6 weeks before her due date her employer can ask for a medical certificate within 7 days that states: ~ \n "
                                ." || she can continue to work \n "
                                ." || it's safe for her to do her normal job \n "
                                ."~ If the certificate says she's fit for work but it isn't safe for her to continue in her normal job, then the employee will be entitled to a safe job or no safe job leave. ~ \n "
                                ."~ If she doesn't provide a medical certificate or the certificate says she can't continue work at all then the employer can direct her to start unpaid parental leave. ~ \n "
                                ."~ If you are unsure about continuing your work it is best to discuss this with your GP. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 33,
                'category_id_fk' => 4,
                'question_text' => 'Useful website:',
                'answer_text' => " @ https://www.fairwork.gov.au/leave/maternity-and-parental-leave/pregnant-employee-entitlements @ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 34,
                'category_id_fk' => 4,
                'question_text' => 'Should I attend ante-natal classes?',
                'answer_text' => "~ We strongly recommend ante-natal classes and breastfeeding classes. It is a good idea to contact the hospital where you will deliver your baby to book for ante-natal classes. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 35,
                'category_id_fk' => 4,
                'question_text' => 'Can I have dental work performed during my pregnancy?',
                'answer_text' => "~ Yes ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 36,
                'category_id_fk' => 4,
                'question_text' => 'Can I colour my hair during pregnancy?',
                'answer_text' => "~ Often pregnant women have concerns about the safety of hair dyes and permanents during pregnancy. There is no scientific data on this question, but it seems unlikely that these types of exposures are harmful. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 37,
                'category_id_fk' => 4,
                'question_text' => 'Are saunas, spas, very hot baths and tanning booths safe during pregnancy?',
                'answer_text' => "~ These are all not recommended in pregnancy. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 38,
                'category_id_fk' => 4,
                'question_text' => 'What can I do for headaches during pregnancy?',
                'answer_text' => " ~ Headaches are common during pregnancy. Usually headaches do not signal a serious problem. How often they occur and how bad they are may vary. It is important to discuss with your GP which medications you can use for the headache. Paracetamol (Panadol) has no complications with pregnancy but check with your GP or a pharmacy prior to having any other medications ~ \n "
                                    ."~ You should contact GP if your headache does not go away, returns very often, is very severe, causes blurry vision or spots in front of your eyes, or is accompanied by nausea. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 39,
                'category_id_fk' => 4,
                'question_text' => 'What can I do to relieve constipation?',
                'answer_text' => "~ At least half of all pregnant women seem to have problems with constipation at one time or another during their pregnancy. One reason for this may be changes in hormones that slow the movement of food through the digestive tract. Occasionally iron supplements may also cause constipation. During the last part of pregnancy, pressure on your rectum from your uterus may add to the problem. ~ \n "
                                ."~ Drink plenty of liquids – at least 6-8 glasses of water each day, including 1-2 glasses of fruit juice such as prune juice. Other liquids (such as coffee, tea and colas) should not be avoided. They will tend to create a dehydrating effect on your body. ~ \n "
                                ."~ Eat food high in fibre, such as raw fruits and vegetables and bran cereals. ~ \n "
                                ."~ Exercise daily - walking is a good form of exercise. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 40,
                'category_id_fk' => 4,
                'question_text' => 'Are leg cramps normal?',
                'answer_text' => "~ In the last three months of pregnancy you may find that you have more leg cramps. This happens because of fluid retention and is not helped by any medications. It always happens at night so ask your partner to rub your calves. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 41,
                'category_id_fk' => 4,
                'question_text' => 'Is bleeding in pregnancy normal?',
                'answer_text' => "~ Bleeding can be frightening, especially in your first pregnancy. A quarter of all pregnant women experience some vaginal bleeding, especially in the first 12 weeks.  In the vast majority of cases it is not a sign that things are not progressing normally still. The cervix is fragile and intercourse can cause a little bleeding. Sometimes the exact cause is never found. It is important if it is more than a few spots, or if there is cramping, or back ache, see your GP or go to Hospital immediately. An ultrasound scan may be arranged to determine the cause and on-gong management. ~ s\n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 42,
                'category_id_fk' => 4,
                'question_text' => 'Are there any symptoms I should be worried about. When should I seek medical attention? ',
                'answer_text' => " ** Severe vomiting – ** ~ Morning sickness and nausea are normal. But, if you cannot keep fluids down for more than twelve hours and are vomiting to the point of dehydration, make an appointment to see your GP ~ \n "
                                    ." ** Severe headache - ** ~ can be a sign of pre-eclampsia a pregnancy complication. ~ \n "
                                    ." ** Visual disturbances of any kind - ** ~ can be a sign of preeclampsia a pregnancy complication. ~ \n "
                                    ." ** Fever – ** ~ If you have a fever, this may mean you have an infection. ~ \n "
                                    ." ** Vaginal discharge or itching – ** ~ This could be an infection such as thrush, which can be treated to relieve the symptoms. ~ \n "
                                    ." ** Burning sensation when urinating – ** ~ This could indicate a urinary infection, which is treated with antibiotics. ~ \n "
                                    ." ** Swelling on one side, leg/calf and/or sudden shortness of breath – ** ~ This could mean a blood clot. Although rare, it is more likely to happen during pregnancy. ~ \n "
                                    ."~ Your GP can help you with any of your concerns. ~\n "
                                    ."~ Hospital provides 24 hour / 7 days a week obstetric cover for emergencies. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 43,
                'category_id_fk' => 4,
                'question_text' => 'What if I am not feeling fetal movements?',
                'answer_text' => "~ Most women will feel and recognize fetal movements between 18-22 weeks. ~ \n "
                                    ."~ If you are concerned that fetal movement is not present or the pattern of your baby's movements have changed, it is recommended that you call your GP or Hospital (depending on time of day). ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('faq_questions')->insert(
            [
                'question_id' => 44,
                'category_id_fk' => 4,
                'question_text' => 'What if something happens after hours?',
                'answer_text' => "~ Pregnancy problems often occur in the middle of the night!  In normal office hours, phone your GPs rooms and ask for advice. After hours and on weekends, please telephone the Hospital Midwives where you are booked to deliver your baby for assistance. Hospitals provides 24 hour / 7 days a week obstetric cover for emergencies. ~ \n ",
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

    }
}
