<x-app-layout title="{{ __('Legal notice') }}">

    @section('paymenter_copyright', 'Powered by paymenter')

    @section('widget_reviews')
    <div class="widget">
        <div class="title">
            <h1><i class="fa-solid fa-angle-right me-2"></i> {{ __('Reviews') }}</h1>
        </div>
        <div class="content">
            <div class="trustpilot-widget" data-locale="de-DE" data-template-id="56278e9abfbbba0bdcd568bc" data-businessunit-id="679298f81bb2105f11f9f0eb" data-style-height="52px" data-style-width="100%">
                <a href="https://de.trustpilot.com/review/mygserv.de" target="_blank" rel="noopener">Trustpilot</a>
            </div>
        </div>
    </div>
    @endsection

    <div class="content">

        <div class="content-box mb-4">
            <div class="flex flex-row">
                @if(config('settings::app_logo'))
                    <img src="{{ asset(config('settings::app_logo')) }}"
                        class="w-16 h-full lg:block hidden rounded-md mr-4" />
                @endif
                <div class="w-full">
                    <h1 class="text-3xl font-semibold text-red-500">
                        {{ __('Legal notice') }}
                    </h1>
                    <div class="w-full text-secondary-400">
                        {{ __('Legal information about the project') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="content-box">
            <h2 class="font-semibold text-xl mb-2 text-secondary-200">
                {{ __('Information according to § 5 DDG:') }}
            </h2>

            <p>Thorsten Schnack</p>
            <p>Am Heidorn 7</p>
            <p>30890 Barsinghausen</p>

            <h2 class="font-semibold text-xl mb-2 mt-2 text-secondary-200">
                {{ __('Contact:') }}
            </h2>

            <p>{{ __('Phone:') }} {{ __('nur auf Anfrage per E-Mail') }}</p>
            <p>{{ __('Mail:') }} info[aet]mygserver.de</p>
            <p>{{ __('Website:') }} https://www.mygserver.de</p>

            <h2 class="font-semibold text-xl mb-2 mt-2 text-secondary-200">
                {{ __('Liability for content') }}
            </h2>
            <p>
                {{ __('As a service provider, we are responsible for our own content on these pages in accordance with Section 7 Paragraph 1 TMG responsible for general laws. However, according to Sections 8 to 10 TMG, we are not a serviceprovider obliged to monitor transmitted or stored third-party information or according to circumstances to conduct research that indicates illegal activity. Obligations to remove or Blocking the use of information in accordance with general laws remains unaffected. However, liability in this regard only arises from the time of knowledge of a specific legal violation possible. If we become aware of any corresponding legal violations, we will immediately remove this content.') }}
            </p>

            <h2 class="font-semibold text-xl mb-2 mt-2 text-secondary-200">
                {{ __('Liability for links') }}
            </h2>
            <p>
                {{ __('Our offer contains links to external third-party websites over whose content we have no influence. We therefore cannot assume any liability for this external content. The respective provider or operator of the pages is always responsible for the content of the linked pages. The linked pages were checked for possible legal violations at the time of linking. Illegal content was not apparent at the time of linking. However, permanent control of the content of the linked pages is unreasonable without concrete evidence of a legal violation. If we become aware of any legal violations, we will immediately remove such links.') }}
            </p>

            <h2 class="font-semibold text-xl mb-2 mt-2 text-secondary-200">
                {{ __('Copyright') }}
            </h2>
            <p>
                {{ __('The content and works on these pages created by the site operators are subject to German copyright law. Reproduction, processing, distribution and any kind of exploitation outside the limits of copyright law require the written consent of the respective author or creator. Downloads and copies of this page are only permitted for private, non-commercial use. If the content on this site was not created by the operator, the copyrights of third parties are respected. In particular, third-party content is marked as such. Should you nevertheless become aware of a copyright infringement, we ask that you notify us accordingly. If we become aware of any legal violations, we will immediately remove such content.') }}
            </p>

            <h2 class="font-semibold text-xl mb-2 mt-2 text-secondary-200">
                {{ __('Dispute resolution') }}
            </h2>
            <p>
                {{ __('The European Commission provides a platform for online dispute resolution (OS):') }}
                https://ec.europa.eu/consumers/odr.
            </p>

            <p>
                {{ __('We are not willing or obliged to take part in dispute resolution proceedings before a consumer arbitration board.') }}
            </p>    
        </div>
    </div>

</x-app-layout>