@extends('layouts.app')
@section('content')


<div class="tips-body" style="padding-top: 40px">
  <h1 style="margin-top: 40px"> Helping tips</h1>
  <div class="tips-container">
    <input type="radio" name="nav" id="first" {{ ( $type=='down' ) ? 'checked' : '' ; }} />
    <input type="radio" name="nav" id="second" {{ ( $type=='autism' ) ? 'checked' : '' ; }} />
    <input type="radio" name="nav" id="third" {{ ( $type=='hearing' ) ? 'checked' : '' ; }} />

    <label for="first" class="first"></label>
    <label for="second" class="second"></label>
    <label for="third" class="third"></label>

    <div class="one slide">
      <blockquote><span class="leftq quotes">&ldquo;</span> Down syndrome is a condition in which a person is born with
        an extra copy of chromosome 21. People with... <a href="#down" id="readDown">read more</a><span
          class="rightq quotes">&bdquo; </span>
      </blockquote>
      <img src="/images/soso.jpg" width="170" height="130" />
      <h2>Down syndrome</h2>
      <h6>Down syndrome could be discovered at early stages of pregnancy .. it remains the mostthe most common
        chromosomal condition diagnosed in the United States. </h6>

    </div>

    <div class="two slide">
      <blockquote>
        <span class="leftq quotes">&ldquo;</span> Autism spectrum disorder (ASD) is a developmental disability caused by
        differences in the brain. Some people ... <a href="#autism" id="readAutism">read more</a><span
          class="rightq quotes">&bdquo; </span>
      </blockquote>
      <img src="/images/autism.jpg" width="170" height="130" />
      <h2>Autism</h2>
      <h6> the autism spectrum disorder (asd) is a development disability caused by diffrences in the brain</h6>

    </div>

    <div class="three slide">
      <blockquote>
        <span class="quotes leftq"> &ldquo;</span> Hearing impairment is the inability of an individual to hear sounds
        adequately. This may ... <a href="#hearing" id="readHearing"> read more</a> <span class="rightq quotes">&bdquo;
        </span>
      </blockquote>
      <img src="/images/hearing.jpg" width="170" height="130" />
      <h2>Hearing disabilities</h2>
      <h6>hearing disabilities could be discovered in early childhood ages which makes it easier to deal with</h6>
    </div>


  </div>


  <div id="down" style="padding-top: 120px">
    <h1>Down syndrome</h1>
    <div class="container">
      Down syndrome is a condition in which a person is born with an extra copy of chromosome 21. People with Down
      syndrome can have physical problems, as well as intellectual disabilities. Every person born with Down syndrome is
      different. People with the syndrome may also have other health problems.
      Like most children, kids with Down syndrome tend to do well with routine. They also respond better to positive
      support than discipline.<br>Keep both of those things in mind as you try the following tips...
      <ol>
        <br>
        <li>Give your child chores around the house. Just break them up into small steps and be patient.</li><br>
        <li>Have your child play with other kids who do and do not have Down syndrome.</li><br>
        <li>Keep your expectations high as your child tries and learns new things.</li><br>
        <li>Make time to play, read, have fun, and go out together.</li><br>
        <li>Support your child in doing day-to-day tasks on their own.</li><br>
        <li>Create a daily routine and stick to it as best you can. For example, the morning might be “get up / eat
          breakfast / brush teeth / get dressed.”</li><br>
        <li>Help your child change from one activity to the next with very clear signals. For younger kids, seeing a
          picture or singing a song can help.</li><br>
        <li>Use pictures to make a daily schedule your child can see.</li><br>
        <li>Avoid saying “That is wrong” to correct mistakes. Instead, say, “Try it again.” Offer help if it is needed.
        </li><br>
        <li>As you work with doctors, therapists, and teachers, focus on your child needs rather than on the condition.
        </li><br>
      </ol>
    </div>
  </div>
  <br><br><br><br><br>

  <div style="padding-top: 120px" id="autism">
    <h1>Autism</h1>
    <div class="container">
      Autism spectrum disorder (ASD) is a developmental disability caused by differences in the brain. Some people with
      ASD have a known difference, such as a genetic condition. Other causes are not yet known. Scientists believe there
      are multiple causes of ASD that act together to change the most common ways people develop.
      There are many things you can do to help a child with Autism Spectrum Disorder (ASD) overcome their challenges.
      These parenting tips, treatments, and services can help.
      <ol>
        <br>
        <li>Provide structure and safety by learning all you can about autism and getting involved in treatment will go
          a long way toward helping your child. Additionally, the following tips will make daily home life easier for
          both you and your child with ASD</li><br>
        <li>Find nonverbal ways to connect, to connect with a child with ASD can be challenging, but you do not need to
          talk—or even touch—in order to communicate and bond. You communicate by the way you look at your child, by the
          tone of your voice, your body language and possibly the way you touch your child. Your child is also
          communicating with you, even if he or she never speaks. You just need to learn the language.</li><br>
        <li>Create a personalized autism treatment plan, with so many different treatments available, it can be tough to
          figure out which approach is right for your child. Making things more complicated, you may hear different or
          even conflicting recommendations from parents, teachers, and doctors.</li><br>
        <li>Find help and support as caring for a child with ASD can demand a lot of energy and time. There may be days
          when you feel overwhelmed, stressed, or discouraged. Parenting is not ever easy, and raising a child with
          special needs is even more challenging. In order to be the best parent you can be, it is essential that you
          take care of yourself.</li><br>
        <li>Stick to a schedule. Children with ASD tend to do best when they have a highly-structured schedule or
          routine. Again, this goes back to the consistency they both need and crave. Set up a schedule for your child,
          with regular times for meals, therapy, school, and bedtime. Try to keep disruptions to this routine to a
          minimum. If there is an unavoidable schedule change, prepare your child for it in advance.</li><br>
        <li>Reward good behavior. Positive reinforcement can go a long way with children with ASD, so make an effort to
          “catch them doing something good.” Praise them when they act appropriately or learn a new skill, being very
          specific about what behavior they are being praised for. Also look for other ways to reward them for good
          behavior, such as giving them a sticker or letting them play with a favorite toy.</li><br>
        <li>Create a home safety zone. Carve out a private space in your home where your child can relax, feel secure,
          and be safe. This will involve organizing and setting boundaries in ways your child can understand. Visual
          cues can be helpful (colored tape marking areas that are off limits, labeling items in the house with
          pictures). You may also need to safety proof the house, particularly if your child is prone to tantrums or
          other self-injurious behaviors.</li><br>

      </ol>
    </div>
  </div>


  <div style="padding-top: 120px" id="hearing">
    <h1>Hearing disabilities</h1>
    <div class="container">
      Hearing impairment is the inability of an individual to hear sounds adequately. This may be due to improper
      development, damage or disease to any part of the hearing mechanism. Hearing is a prerequisite for the development
      of normal speech & language.
      To make it easier to hear and understand speech at home and in the classroom:

      <ol>
        <br>
        <li>Get your child attention before talking, giving instructions, or starting new activities. Try calling their
          name, touching their shoulder, flicking the lights, or using a hand signal or word you both agree on.</li><br>
        <li>Show your child whois talking and repeat or rephrase what they say.</li><br>
        <li>If your child does not understand something, try using different words that are easy to understand instead
          of repeating the same question or statement.</li><br>
        <li>Ask your child questions to help them understand the subject you are talking about.</li><br>
        <li>“Chunk” instructions into short pieces and only include what they need to know.</li><br>
        <li>At school, teachers should give children short breaks during lessons and face the students when giving
          spoken instructions. Your child classroom microphone can be passed around during discussions or presentations.
        </li><br>
        <li>Encourage your child to let you or their teacher know when they do not hear or understand something, or if
          noise bothers them.</li><br>
        <li>Give your child enough time to think about what you said before they respond.</li><br>
        <li>Involve your child in group activities they enjoy (e.g., swimming, crafts, gymnastics, music).</li><br>
        <li>It is important to be patient and encouraging.</li>

      </ol>
    </div>
  </div>
</div>
<script>
  const showDown = document.getElementById('down');
 const btnDown = document.getElementById('readDown');
 showDown.style.display = 'none';

 btnDown.addEventListener('click', function handleClick(){
if (showDown.style.display === 'none'){
  showDown.style.display = 'block';
  showHearing.style.display = 'none';
  showAutism.style.display = 'none';

}
});
const showAutism = document.getElementById('autism');
 const btnAutism = document.getElementById('readAutism');
 showAutism.style.display = 'none';

 btnAutism.addEventListener('click', function handleClick(){
if (showAutism.style.display === 'none'){
  showAutism.style.display = 'block';
  showDown.style.display = 'none';
  showHearing.style.display = 'none';
}
});
const showHearing = document.getElementById('hearing');
 const btnHearing = document.getElementById('readHearing');
 showHearing.style.display = 'none';

 btnHearing.addEventListener('click', function handleClick(){
if (showHearing.style.display === 'none'){
  showHearing.style.display = 'block';
  showDown.style.display = 'none';
  showAutism.style.display = 'none';
}
});
</script>
@endsection