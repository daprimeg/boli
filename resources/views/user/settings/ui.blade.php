@include('user.partial.layout')


<style>

.w-33 {
    width: 28% !important;
}

</style>


<div class="container py-4">
    <h3 class="mb-4">UI Settings</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('user.settings.ui.update') }}" method="POST">
        @csrf









        <div class="template-customizer-inner pt-6">
   <div class="template-customizer-theming">
      <h5 class="m-0 px-6 pb-6"> <span class="template-customizer-t-theming_header bg-label-primary rounded-1 py-1 px-3 small">Theming</span> </h5>
<div class="row">







<div class="m-0 px-6 pb-6 template-customizer-theme w-33">
   <label for="customizerTheme" class="form-label d-block template-customizer-t-theme_label mb-2">Theme</label> 
   <div class="row px-1 template-customizer-themes-options">
      <div class="col-4 px-2">
         <div class="form-check custom-option custom-option-icon mb-0 {{ ($setting->theme ?? '') === 'light' ? 'checked' : '' }}">
            <label class="form-check-label custom-option-content p-0" for="customRadioIconlight">
               <span class="custom-option-body mb-0 scaleX-n1-rtl"><i class="ti tabler-sun icon-base mb-0"></i></span>
            </label>
            <input name="theme" class="form-check-input d-none" type="radio" value="light" id="customRadioIconlight" {{ ($setting->theme ?? '') === 'light' ? 'checked' : '' }}>
         </div>
         <label class="form-check-label small text-nowrap text-body" for="customRadioIconlight">Light</label>
      </div>
      <div class="col-4 px-2">
         <div class="form-check custom-option custom-option-icon mb-0 {{ ($setting->theme ?? '') === 'dark' ? 'checked' : '' }}">
            <label class="form-check-label custom-option-content p-0" for="customRadioIcondark">
               <span class="custom-option-body mb-0 scaleX-n1-rtl"><i class="ti tabler-moon icon-base mb-0"></i></span>
            </label>
            <input name="theme" class="form-check-input d-none" type="radio" value="dark" id="customRadioIcondark" {{ ($setting->theme ?? '') === 'dark' ? 'checked' : '' }}>
         </div>
         <label class="form-check-label small text-nowrap text-body" for="customRadioIcondark">Dark</label>
      </div>

   </div>
</div>


<div class="m-0 px-6 pb-6 template-customizer-skins w-33">
    <label for="customizerSkin" class="form-label template-customizer-t-skin_label mb-2">Skins</label>
    <div class="row px-1 template-customizer-skins-options">
        <!-- Default Skin -->
        <div class="col-4 px-2">
            <div class="form-check custom-option custom-option-image custom-option-image-radio mb-0 {{ ($setting->skin ?? '') === 'default' ? 'checked' : '' }}">
                <label class="form-check-label custom-option-content p-0" for="skinRadiosdefault">
                    <span class="custom-option-body mb-0 scaleX-n1-rtl">
                        <!-- Default Skin SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 104 66" height="62" width="98">
                            <rect fill-opacity="0.02" fill="currentColor" rx="4" height="66" width="104"></rect>
                            <path fill-opacity="0.08" fill="currentColor" d="M0 4C0 1.79086 1.79086 0 4 0H27.4717V66H4C1.79086 66 0 64.2091 0 62V4Z"></path>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="23.8839" x="4.90625"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="2" height="9.70588" width="9.81132" y="5.88135" x="8.83008"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="34.4381" x="4.90625"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="44.9923" x="4.90625"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="55.5462" x="4.90625"></rect>
                            <rect fill-opacity="0.08" fill="currentColor" rx="2" height="8.8" width="64.7547" y="4.67166" x="34.1152"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="37.0391"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="80.21"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="86.0957"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="91.9824"></rect>
                            <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="40.2264" y="19.6134" x="58.4844"></rect>
                            <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="19.0455" y="19.6134" x="34.1152"></rect>
                            <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="64.7547" y="42.4545" x="34.1152"></rect>
                        </svg>
                    </span>
                </label>
                <input name="skin" class="form-check-input d-none" type="radio" value="default" id="skinRadiosdefault" {{ ($setting->skin ?? '') === 'default' ? 'checked' : '' }}>
            </div>
            <label class="form-check-label small text-nowrap text-body" for="skinRadiosdefault">Default</label>
        </div>

        <!-- Bordered Skin -->
        <div class="col-4 px-2">
            <div class="form-check custom-option custom-option-image custom-option-image-radio mb-0 {{ ($setting->skin ?? '') === 'bordered' ? 'checked' : '' }}">
                <label class="form-check-label custom-option-content p-0" for="skinRadiosbordered">
                    <span class="custom-option-body mb-0 scaleX-n1-rtl">
                        <!-- Bordered Skin SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 104 66" height="62" width="98">
                            <rect fill-opacity="0.02" fill="currentColor" rx="4" height="66" width="104"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="23.8839" x="4.90625"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="2" height="9.70588" width="9.81132" y="5.88135" x="8.83008"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="34.4381" x="4.90625"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="44.9923" x="4.90625"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="55.5462" x="4.90625"></rect>
                            <rect stroke-opacity="0.12" stroke="currentColor" rx="1.5" height="7.8" width="63.7547" y="5.17166" x="34.6152"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="37.0391"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="80.21"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="86.0957"></rect>
                            <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="91.002"></rect>
                            <rect stroke-opacity="0.12" stroke="currentColor" rx="1.5" height="16.6" width="39.2264" y="20.1134" x="58.9844"></rect>
                            <rect stroke-opacity="0.12" stroke="currentColor" rx="1.5" height="16.6" width="18.0455" y="20.1134" x="34.6152"></rect>
                            <rect stroke-opacity="0.12" stroke="currentColor" rx="1.5" height="16.6" width="63.7547" y="42.9545" x="34.6152"></rect>
                        </svg>
                    </span>
                </label>
                <input name="skin" class="form-check-input d-none" type="radio" value="bordered" id="skinRadiosbordered" {{ ($setting->skin ?? '') === 'bordered' ? 'checked' : '' }}>
            </div>
            <label class="form-check-label small text-nowrap text-body" for="skinRadiosbordered">Bordered</label>
        </div>
    </div>
</div>



<div class="m-0 px-6 template-customizer-semiDark w-33 d-flex ">
    <span class="form-label template-customizer-t-semiDark_label">Semi Dark</span>
    <label class="switch template-customizer-t-semiDark_label">
        <input type="checkbox"
               class="template-customizer-semi-dark-switch switch-input"
               name="semi_dark"
               value="on" {{ ($setting->semi_dark ?? '') === 'true' ? 'checked' : '' }}>
        <span class="switch-toggle-slider">
            <span class="flase"></span>
            <span class="true"></span>
        </span>
    </label>
</div>   
      
      <hr class="m-0 px-6 my-6">
   </div>



</div>

   <div class="template-customizer-layout">
      <h5 class="m-0 px-6 pb-6"> <span class="template-customizer-t-layout_header bg-label-primary rounded-2 py-1 px-3 small">Layout</span> </h5>

<div class="row">

<div class="m-0 px-6 pb-6 d-block template-customizer-layouts w-33">
   <label for="customizerStyle" class="form-label d-block template-customizer-t-layout_label mb-2">Menu (Navigation)</label> 
   <div class="row px-1 template-customizer-layouts-options">
      <!-- Expanded Option -->
      <div class="col-4 px-2">
         <div class="form-check custom-option custom-option-image custom-option-image-radio mb-0">
            <label class="form-check-label custom-option-content p-0" for="layoutsRadiosexpanded">
               <span class="custom-option-body mb-0 scaleX-n1-rtl">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 104 66" height="62" width="98">
                     <rect fill-opacity="0.02" fill="currentColor" rx="4" height="66" width="104"></rect>
                     <path fill-opacity="0.08" fill="currentColor" d="M0 4C0 1.79086 1.79086 0 4 0H27.4717V66H4C1.79086 66 0 64.2091 0 62V4Z"></path>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="23.8839" x="4.90625"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="2" height="9.70588" width="9.81132" y="5.88135" x="8.83008"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="34.4381" x="4.90625"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="44.9923" x="4.90625"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="55.5462" x="4.90625"></rect>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="8.8" width="64.7547" y="4.67166" x="34.1152"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="37.0391"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="80.21"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="86.0957"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="91.9824"></rect>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="40.2264" y="19.6134" x="58.4844"></rect>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="19.0455" y="19.6134" x="34.1152"></rect>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="64.7547" y="42.4545" x="34.1152"></rect>
                  </svg>
               </span>
            </label>
            <input name="menu" class="form-check-input d-none" type="radio" value="expanded" id="layoutsRadiosexpanded" {{ ($setting->menu ?? '') === 'expanded' ? 'checked' : '' }}>
         </div>
         <label class="form-check-label small text-nowrap text-body" for="layoutsRadiosexpanded">Expanded</label>
      </div>

      <!-- Collapsed Option -->
      <div class="col-4 px-2">
         <div class="form-check custom-option custom-option-image custom-option-image-radio mb-0">
            <label class="form-check-label custom-option-content p-0" for="layoutsRadioscollapsed">
               <span class="custom-option-body mb-0 scaleX-n1-rtl">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 104 66" height="62" width="98">
                     <rect fill-opacity="0.02" fill="currentColor" rx="4" height="66" width="104"></rect>
                     <path fill-opacity="0.04" fill="currentColor" d="M0 4C0 1.79086 1.79086 0 4 0H13.7359V66H4C1.79086 66 0 64.2091 0 62V4Z"></path>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="7.84906" y="23.8839" x="2.94336"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="2" height="6.79412" width="6.86793" y="5.88135" x="3.43359"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="7.84906" y="34.4382" x="2.94336"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="7.84906" y="44.9923" x="2.94336"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="7.84906" y="55.5463" x="2.94336"></rect>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="8.8" width="75.437" y="4.67169" x="21.4717"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="25.6172"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="78.248"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="84.1348"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="90.0215"></rect>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="46.8212" y="19.6134" x="50.4912"></rect>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="22.1679" y="19.6134" x="21.4717"></rect>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="75.8413" y="42.4545" x="21.4717"></rect>
                  </svg>
               </span>
            </label>
            <input name="menu" class="form-check-input d-none" type="radio" value="collapsed" id="layoutsRadioscollapsed" {{ ($setting->menu ?? '') === 'collapsed' ? 'checked' : '' }}>
         </div>
         <label class="form-check-label small text-nowrap text-body" for="layoutsRadioscollapsed">Collapsed</label>
      </div>
   </div>
</div>



<div class="m-0 px-6 pb-6 template-customizer-layoutNavbarOptions w-33">
   <label for="customizerNavbar" class="form-label template-customizer-t-layout_navbar_label mb-2">Navbar Type</label> 
   <div class="row px-1 template-customizer-navbar-options">
      <!-- Sticky -->
      <div class="col-4 px-2">
         <div class="form-check custom-option custom-option-image custom-option-image-radio mb-0 {{ ($setting->navbar ?? '') === 'sticky' ? 'checked' : '' }}">
            <label class="form-check-label custom-option-content p-0" for="navbarOptionRadiossticky">
               <span class="custom-option-body mb-0 scaleX-n1-rtl">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 104 66" height="62" width="98">
                           <rect fill-opacity="0.02" fill="currentColor" rx="4" height="66" width="104"></rect>
                           <path fill-opacity="0.08" fill="currentColor" d="M0 4C0 1.79086 1.79086 0 4 0H27.4717V66H4C1.79086 66 0 64.2091 0 62V4Z"></path>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="23.8839" x="4.90625"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="2" height="9.70588" width="9.81132" y="5.88135" x="8.83008"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="34.4382" x="4.90625"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="44.9923" x="4.90625"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="17.6604" y="55.5463" x="4.90625"></rect>
                           <rect fill-opacity="0.08" fill="currentColor" rx="2" height="8.8" width="64.7547" y="4.67169" x="32.1523"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="35.0781"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="78.248"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="84.1348"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="90.0215"></rect>
                           <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="40.2264" y="19.6134" x="57.0859"></rect>
                           <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="19.0455" y="19.6134" x="32.1523"></rect>
                           <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="65.1591" y="42.4545" x="32.1523"></rect>
                </svg>
               </span>
            </label>
            <input name="navbar" class="form-check-input d-none" type="radio" value="sticky" id="navbarOptionRadiossticky" {{ ($setting->navbar ?? '') === 'sticky' ? 'checked' : '' }}>
         </div>
         <label class="form-check-label small text-nowrap text-body" for="navbarOptionRadiossticky">Sticky</label>
      </div>

      <!-- Static -->
      <div class="col-4 px-2">
         <div class="form-check custom-option custom-option-image custom-option-image-radio mb-0 {{ ($setting->navbar ?? '') === 'static' ? 'checked' : '' }}">
            <label class="form-check-label custom-option-content p-0" for="navbarOptionRadiosstatic">
               <span class="custom-option-body mb-0 scaleX-n1-rtl">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 104 66" height="62" width="98">
                           <rect fill-opacity="0.02" fill="currentColor" rx="4" height="66" width="104"></rect>
                           <path fill-opacity="0.06" fill="currentColor" d="M0 4C0 1.79086 1.79086 0 4 0H13.7359V66H4C1.79086 66 0 64.2091 0 62V4Z"></path>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="7.84906" y="23.8839" x="2.94336"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="2" height="6.79412" width="6.86793" y="5.88135" x="3.43359"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="7.84906" y="34.4382" x="2.94336"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="7.84906" y="44.9923" x="2.94336"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1.39473" height="2.78946" width="7.84906" y="55.5463" x="2.94336"></rect>
                           <rect fill-opacity="0.08" fill="currentColor" rx="2" height="8.8" width="75.437" y="4.67169" x="21.4717"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="25.6172"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="78.248"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="84.1348"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87158" x="90.0215"></rect>
                           <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="46.8212" y="19.6134" x="50.4912"></rect>
                           <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="22.1679" y="19.6134" x="21.4717"></rect>
                           <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="75.8413" y="42.4545" x="21.4717"></rect>
                </svg>
               </span>
            </label>
            <input name="navbar" class="form-check-input d-none" type="radio" value="static" id="navbarOptionRadiosstatic" {{ ($setting->navbar ?? '') === 'static' ? 'checked' : '' }}>
         </div>
         <label class="form-check-label small text-nowrap text-body" for="navbarOptionRadiosstatic">Static</label>
      </div>

      <!-- Hidden -->
      <div class="col-4 px-2">
         <div class="form-check custom-option custom-option-image custom-option-image-radio mb-0 {{ ($setting->navbar ?? '') === 'hidden' ? 'checked' : '' }}">
            <label class="form-check-label custom-option-content p-0" for="navbarOptionRadioshidden">
               <span class="custom-option-body mb-0 scaleX-n1-rtl">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 104 66" height="62" width="98">
                           <rect fill-opacity="0.02" fill="currentColor" rx="4" height="66" width="104"></rect>
                           <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="46.8212" y="19.6136" x="44.0068"></rect>
                           <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="22.1679" y="19.6136" x="14.9854"></rect>
                           <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="75.8413" y="42.4547" x="14.9854"></rect>
                           <rect fill-opacity="0.08" fill="currentColor" rx="2" height="9.00999" width="74.1506" y="4.68896" x="14.9248"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1" height="5.38019" width="6.00327" y="6.50403" x="20.0264"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1.23064" height="2.46129" width="6.6372" y="7.96356" x="33.877"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1.23064" height="2.46129" width="6.6372" y="7.96356" x="48.3652"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1.23064" height="2.46129" width="6.6372" y="7.96356" x="62.8506"></rect>
                           <rect fill-opacity="0.3" fill="currentColor" rx="1.23064" height="2.46129" width="6.6372" y="7.96356" x="77.3379"></rect>
                </svg>
               </span>
            </label>
            <input name="navbar" class="form-check-input d-none" type="radio" value="hidden" id="navbarOptionRadioshidden" {{ ($setting->navbar ?? '') === 'hidden' ? 'checked' : '' }}>
         </div>
         <label class="form-check-label small text-nowrap text-body" for="navbarOptionRadioshidden">Hidden</label>
      </div>
   </div>
</div>




<div class="m-0 px-6 pb-6 template-customizer-content w-33">
   <label for="customizerContent" class="form-label template-customizer-t-content_label mb-2">Content</label> 
   <div class="row px-1 template-customizer-content-options">

      <!-- Compact Option -->
      <div class="col-4 px-2">
         <div class="form-check custom-option custom-option-image custom-option-image-radio mb-0 {{ ($setting->content ?? '') === 'compact' ? 'checked' : '' }}">
            <label class="form-check-label custom-option-content p-0" for="contentRadioIconcompact">
               <span class="custom-option-body mb-0 scaleX-n1-rtl">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 104 66" height="62" width="98">
                     <rect fill-opacity="0.02" fill="currentColor" rx="4" height="66" width="104"/>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="8.8" width="64.7547" y="4.67169" x="19.4209"/>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87164" x="22.3447"/>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87164" x="65.5146"/>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87164" x="71.4014"/>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="3.92453" y="6.87164" x="77.2881"/>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="40.2264" y="19.6135" x="44.3525"/>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="19.0455" y="19.6135" x="19.4209"/>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="65.1591" y="42.4545" x="19.4209"/>
                  </svg>
               </span>
            </label>
            <input name="content" class="form-check-input d-none" type="radio" value="compact" id="contentRadioIconcompact" {{ ($setting->content ?? '') === 'compact' ? 'checked' : '' }}>
         </div>
         <label class="form-check-label small text-nowrap text-body" for="contentRadioIconcompact">Compact</label>
      </div>

      <!-- Wide Option -->
      <div class="col-4 px-2">
         <div class="form-check custom-option custom-option-image custom-option-image-radio mb-0 {{ ($setting->content ?? '') === 'wide' ? 'checked' : '' }}">
            <label class="form-check-label custom-option-content p-0" for="contentRadioIconwide">
               <span class="custom-option-body mb-0 scaleX-n1-rtl">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 104 66" height="62" width="98">
                     <rect fill-opacity="0.02" fill="currentColor" rx="4" height="66" width="104"/>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="8.8" width="90.6244" y="4.67169" x="6.6875"/>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="4.90566" y="6.87164" x="10.165"/>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="4.90566" y="6.87164" x="75.2002"/>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="4.90566" y="6.87164" x="82.0674"/>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1" height="4.4" width="4.90566" y="6.87164" x="88.9346"/>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="55.9476" y="19.6135" x="41.3652"/>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="26.4888" y="19.6135" x="6.6875"/>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="17.6" width="90.6244" y="42.4545" x="6.6875"/>
                  </svg>
               </span>
            </label>
            <input name="content" class="form-check-input d-none" type="radio" value="wide" id="contentRadioIconwide" {{ ($setting->content ?? '') === 'wide' ? 'checked' : '' }}>
         </div>
         <label class="form-check-label small text-nowrap text-body" for="contentRadioIconwide">Wide</label>
      </div>

   </div>
</div>



<div class="m-0 px-6 pb-6 template-customizer-directions w-33">
   <label for="customizerDirection" class="form-label template-customizer-t-direction_label mb-2">Direction</label> 
   <div class="row px-1 template-customizer-directions-options">
      <!-- Left to Right (LTR) -->
      <div class="col-4 px-2">
         <div class="form-check custom-option custom-option-image custom-option-image-radio mb-0 {{ ($setting->direction ?? '') === 'ltr' ? 'checked' : '' }}">
            <label class="form-check-label custom-option-content p-0" for="directionRadioIconltr">
               <span class="custom-option-body mb-0 scaleX-n1-rtl">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 104 66" height="62" width="98">
                     <rect fill-opacity="0.02" fill="currentColor" rx="4" height="66" width="104"></rect>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="57.5885" width="24.0976" y="4.12146" x="5.20215"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="13.8545" y="16.8697" x="10.3232"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="9.87943" y="25.5618" x="10.3232"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="12.3826" y="34.2538" x="10.3232"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="6.08818" y="42.946" x="10.3232"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="8.09094" y="51.6384" x="10.3232"></rect>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="57.5885" width="62.3885" y="4.12134" x="35.5137"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="13.8545" y="14.1833" x="43.7578"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="32.8013" y="22.8753" x="43.7578"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="41.2076" y="31.5674" x="43.7578"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="32.8013" y="40.2593" x="43.7578"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="5.77482" y="48.9517" x="43.7578"></rect>
                  </svg>
               </span>
            </label>
            <input name="direction" class="form-check-input d-none" type="radio" value="ltr" id="directionRadioIconltr" {{ ($setting->direction ?? '') === 'ltr' ? 'checked' : '' }}>
         </div>
         <label class="form-check-label small text-nowrap text-body" for="directionRadioIconltr">Left to Right (En)</label>
      </div>

      <!-- Right to Left (RTL) -->
      <div class="col-4 px-2">
         <div class="form-check custom-option custom-option-image custom-option-image-radio mb-0 {{ ($setting->direction ?? '') === 'rtl' ? 'checked' : '' }}">
            <label class="form-check-label custom-option-content p-0" for="directionRadioIconrtl">
               <span class="custom-option-body mb-0 scaleX-n1-rtl">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 104 66" height="62" width="98">
                     <rect fill-opacity="0.02" fill="currentColor" rx="4" height="66" width="104"></rect>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="57.5885" width="24.0976" y="4.12134" x="73.4756"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="13.8545" y="16.8697" x="78.5986"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="9.87943" y="25.5618" x="82.5713"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="12.3826" y="34.2537" x="80.0693"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="6.08818" y="42.9459" x="86.3633"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="8.09094" y="51.6382" x="84.3613"></rect>
                     <rect fill-opacity="0.08" fill="currentColor" rx="2" height="57.5885" width="62.3885" y="4.12146" x="5.20215"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="13.8545" y="14.1833" x="45.709"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="32.8013" y="22.8754" x="26.7617"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="41.2076" y="31.5674" x="18.3555"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="32.8013" y="40.2594" x="26.7617"></rect>
                     <rect fill-opacity="0.3" fill="currentColor" rx="1.04605" height="2.0921" width="5.77482" y="48.9517" x="53.7881"></rect>
                  </svg>
               </span>
            </label>
            <input name="direction" class="form-check-input d-none" type="radio" value="rtl" id="directionRadioIconrtl" {{ ($setting->direction ?? '') === 'rtl' ? 'checked' : '' }}>
         </div>
         <label class="form-check-label small text-nowrap text-body" for="directionRadioIconrtl">Right to Left (Ar)</label>
      </div>
   </div>
</div>


</div>


   </div>
</div>








        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>

@include('user.partial.footer')
