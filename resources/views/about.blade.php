@extends('layout')

@section('main')
    <!-- main -->
    <main class="container">
      <section class="single-blog-post">
        <h1>About</h1>
        <div class="single-blog-post-ContentImage" data-aos="fade-left">
          <img src="{{asset('images/photography.jpg')}}" alt="" />
          Ramagrama lies in the midst of bucolic farmland and is surrounded by wetlands. – © Michael Turtle
        </div>
          <p> The Ramagrama Stupa is said to be one of the eight places where the relics of 
            Buddha’s body were put after his cremation. It is the only one that has never been 
            opened.</P>
        <div>
          
          <img src="{{asset('images/image1.jpg')}}" alt="" />
         Because of its significance, the Ramagrama Stupa is on a Tentative List for 
          consideration as a new World Heritage site. – © Michael Turtle
        </div>
        <p>Legend says that Emperor Asoka came to the stupa at Ramagrama in 249 BC and planned 
          to open it and retrieve the relics of Buddha. But, when he arrived, he had a vision of a 
          snake god that told him not to interfere with the site, and so he left it alone and worshipped 
          at it instead.</p>

         <p> Today, all you’ll be able to see is a grassy mound but excavation work has determined that 
          there is a stupa within it. Although experts have studied the site, there is an agreement 
          to not open the stupa, to maintain its sanctity.</p>

          <div>
          
          <img src="{{asset('images/image2.jpg')}}" alt="" />
          The mound was first discovered in 1899 and further research in 1964 confirmed there is a stupa 
          contained within it. An excavation project in 1997 gathered more information. – © Michael Turtle
        </div>
        <p>When you visit, you’ll also notice a large tree rising up from the mound. In fact, if you look closely, 
          you’ll realise there are actually four trees of different species, intertwined and living in harmony. 
          For pilgrims, it’s an important symbol that reflects the ideal of Buddhism.</p>
      </section>
    </main>
    @endsection

    