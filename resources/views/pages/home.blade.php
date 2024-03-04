@extends('layouts.app')

@section('content')

<div class="home-body">
   <!-- loader  -->

   <!-- end loader -->
   <!-- header -->
   <!-- header inner -->
   <div class="head_top">

      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-6">
                  <div class="text-bg">
                     @auth <h1 style="display: inline;">
                        Welcome, {{ $user->name }} here's
                     </h1> @endauth
                     <h1 style="display: inline;">What hemam website offers..</h1>
                     {{-- <p>Hemam website offers a broad services of knowledge and more for handicapped and special needs parents to help them with dealing with their children and find best options for them</p> --}}
                     <p>We offer a broad services of knowledge and more for handicapped and special needs parents to help them with dealing with their children and loved ones and to find best options for them.
                        As this website will provide you with many useful tips for dealing with any person with ASD, Down syndrome, Hearing disabilities..<br>
                      Also this website offers you courses which teaches you the faudementals of communicating with those cases
                      and for those who are going to pass the exam at the end of the course is going to have a certificate from our website that they have learned the fundementals of communication with the studied case.</p>
                     <a href="#read">Learn more</a>
                     @auth
                     <a href="#taple">My Courses</a>

                     @endauth
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="text-img">
                     <figure><img src="images/fam.png" alt="#" /></figure>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>

   <!-- end banner -->
   <!-- business -->
   @auth
   <div class="business container" id="taple">

      <div class="row">
         <div class="col-md-12">
            <div class="taplepage">
               @if (count($user->usersCourses) > 0)
               <h2>here's the courses you are subscribed in</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-10 offset-md-1">
            <div class="row">
               <div class="col-md-12">
                  <div class="business_box ">
                     <figure>
                        <table class="table table-dark mt-4">
                           <thead>
                              <tr>
                                 <th scope="col">Number</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Videos</th>
                                 <th scope="col">Descreption</th>
                                 <th scope="col">URL</th>

                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($user->usersCourses as $course)
                              <tr>
                                 <th scope="row">{{ $loop->iteration }}</th>
                                 <td>{{ $course->name }}</td>
                                 <td>{{ $course->videos_number }}</td>
                                 <td>{{ $course->descreption }}</td>
                                 <td><a href="/Courses/{{ $course->id }}" style="color: #0891f8; display: inline-block;">Go to the course</a></td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </figure> <a class="read_more"  href="/Courses">Buy more cources</a>
                  </div>
                  @else
                  <h3>You are not subscribed in any course yet </h3>
                  <a class="read_more  buy_course" href="/Courses">Buy cources</a>
                  @endif


               </div>
            </div>
         </div>
      </div>
   </div>


   @if (count($user->usersFinishedCourses) > 0)
   <div class="business container">

      <div class="row">
         <div class="col-md-12">
            <div class="taplepage">

               <h2>here's the courses that you passed</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-10 offset-md-1">
            <div class="row">
               <div class="col-md-12">
                  <div class="business_box ">
                     <figure>
                        <table class="table table-dark mt-4">
                           <thead>
                              <tr>
                                 <th scope="col">Number</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">URL</th>

                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($user->usersFinishedCourses as $Course)
                              <tr>
                                 <th scope="row">{{ $loop->iteration }}</th>
                                 <td>{{ $Course->name }}</td>

                                 <td><a href="/Course/certificate/{{ $Course->id }}" target="_blank" style="color: #0891f8; ">Show your certificate</a></td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </figure>



                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   @endif

   @endauth

   <div class="business" id="read">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <span>Increase your knowledge to help for</span>
                  <h2>Better empowerement for handicapped children in community</h2>
                  <p> in order for this goal to be achieved we need to spread knowledge about them </p>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-10 offset-md-1">
               <div class="row">
                  <div class="col-md-12">
                     <div class="business_box ">
                        <figure><img src="images/group-removebg-preview.png" alt="#" /></figure>
                        <p>Those amazing people have great potintial and great cababilities, they just need supporting system and cooperating enviroment to boost them to grow and show everyone how creative they can get. Help us reach the goal and increase your knowledge , if you were a parent or even if you just happen to have a direct contact with a handicapped person , by learning more about communication with them you are going to help the evolving and reaching their dreams.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection