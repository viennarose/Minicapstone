<x-app-layout>
    <x-slot name="header">
        <div class="bg-info p-5 opacity-75">
            <h1 class="text-center">ABOUT US</h1>
        </div>
    </x-slot>

    <div>

        <div class="card" data-aos="fade-right" data-aos-duration="1500">
            <div class="row m-5">
                <div class="col-md-4">
                    <img src="{{url('./owner.jpg')}}" style="width: 100%; height: auto;" alt="Owner">
                </div>
                <div class="col-md-8">
                    <h1 class="fw-light">THE OWNER</h1>


                <p> The dental clinic is a place where a dentist performs dental procedures and treatments on patients. Dental clinics can be found in hospitals, schools, government offices, and other health-related establishments. The clinic is usually a single room housing all dental equipment and tools. Often, though not always, low-cost or free treatments are performed.</p>
                <p>A dental office is a business establishment owned and/or run by a dental professional. It has several components and handles not only dental services and treatments, but also clerical and financial concerns. Dr. Gordon’s dental office is a perfect example of such an establishment, with multiple employees and different departments.</p>
                </div>
            </div>
        </div>

        <div class="card" data-aos="fade-left" data-aos-duration="1500">
            <div class="row m-5">
            <div class="col-md-8">
                <h1 class="fw-light">THE EMPLOYEES</h1>
                <p>Our dental office is equipped with the latest state-of-the-art dental tools and devices necessary to ensure quality and accurate work. We also have several dental hygienists and assistants who work alongside Dr. Gordon to make treatments faster and more precise. If you don’t have a dentist yet, it’s best to choose one who has a dental office. A dentist who has an established business within a well-built office is a reputable and legitimate practitioner you can truly trust.</p>
            <p>Dental clinics also frequently serve an educational purpose. They are often associated with university dental schools. In contrast, private practices or “dental offices” are owned by a dentist or an associated medical institution.</p>
            </div>

            <div class="col-md-4">
                <img src="{{url('./employees.jpg')}}" style="width: 100%; height: auto;" alt="Owner">
            </div>
            </div>
        </div>
        </div>

  </x-app-layout>
