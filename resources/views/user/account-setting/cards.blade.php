<div style="margin-top:2rem;">
  <main style="max-width:1200px;margin:auto;padding:1rem;">
    <div style="display:flex;flex-wrap:wrap;gap:1.5rem;">
      
      <!-- Your Interest Panel -->
<section style="flex:1 1 48%;">
  <div style="border-radius:1rem;padding:1.75rem;display:flex;flex-direction:column;gap:1.5rem;box-shadow:0 10px 35px rgba(7, 11, 23, 0.55);background:#0b1120;">
    <header style="display:flex;align-items:center;justify-content:space-between;color:#e2e8f0;">
      <h2 style="margin:0;font-size:1.25rem;font-weight:600;">Your Interest</h2>
      <button type="button" style="background:transparent;border:0;color:#94a3b8;font-size:1.25rem;line-height:1;cursor:pointer;">⋮</button>
    </header>

    <div id="interestContainer" style="display:flex;flex-direction:column;gap:1rem;">
      @foreach($interests as $index => $interest)
        <article class="interest-item" style="display:flex;align-items:center;justify-content:space-between;gap:1rem; {{ $index >= 4 ? 'display:none;' : '' }}">
          <div style="display:flex;align-items:center;gap:0.9rem;">
            <div style="width:48px;height:48px;border-radius:50%;overflow:hidden;border:2px solid rgba(56,189,248,0.35);background:#1f2430;display:flex;align-items:center;justify-content:center;color:#94a3b8;font-weight:600;">
              {{ strtoupper(substr($interest->title, 0, 2)) }}
            </div>
            <div>
              <h3 style="margin:0;font-size:1rem;color:#e2e8f0;font-weight:600;">{{ $interest->title }}</h3>
              <p style="margin:0.15rem 0 0;font-size:0.85rem;color:#94a3b8;">
                {{ $interest->make->name ?? 'N/A' }} - {{ $interest->model->name ?? 'N/A' }}
              </p>
            </div>
          </div>

          @php
            $status = $interest->status ?? 0;
            $statusColor = $status ? '#34d399' : '#f87171';
            $statusLabel = $status ? 'Active' : 'Inactive';
          @endphp
          <span style="padding:0.35rem 0.75rem;border-radius:999px;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.03em;color:#0b1120;background:{{ $statusColor }};flex-shrink:0;">
            {{ $statusLabel }}
          </span>
        </article>
      @endforeach
    </div>

    @if($interests->count() > 4)
      <button id="viewMoreInterestBtn" style="margin-top:0.5rem;padding:0.5rem;text-align:center;border-radius:0.5rem;background:#3b82f6;color:#fff;font-weight:600;border:none;cursor:pointer;">
        View More
      </button>
    @endif
  </div>
</section>




<section style="flex:1 1 48%;">
  <div style="border-radius:1rem;padding:1.75rem;display:flex;flex-direction:column;gap:1.5rem;box-shadow:0 10px 35px rgba(7, 11, 23, 0.55);background:#0b1120;">
    <header style="display:flex;align-items:center;justify-content:space-between;color:#e2e8f0;">
      <h2 style="margin:0;font-size:1.25rem;font-weight:600;">Recent Views</h2>
      <button type="button" style="background:transparent;border:0;color:#94a3b8;font-size:1.25rem;line-height:1;cursor:pointer;">⋮</button>
    </header>

    <div id="recentViewsContainer" style="display:flex;flex-direction:column;gap:1rem;">
      @foreach($recentViews as $index => $view)
        @php
          $vehicle = $view->vehicle;
          $firstImage = '/placeholder.svg?height=48&width=64';
          if ($vehicle && $vehicle->images) {
              $imagesArray = explode(',', $vehicle->images);
              $firstImage = trim($imagesArray[0]);
          }

          $status = $vehicle->bidding_status ?? 'N/A';
          $statusColor = '#34d399'; 
          $statusLabel = 'Available';
          switch($status) {
              case 'sold':
                  $statusColor = '#f87171'; 
                  $statusLabel = 'Sold';
                  break;
              case 'On Sale':
                  $statusColor = '#fbbf24'; 
                  $statusLabel = 'On Sale';
                  break;
              case 'Provisional':
                  $statusColor = '#3b82f6'; 
                  $statusLabel = 'Provisional';
                  break;
              default:
                  $statusColor = '#94a3b8';
                  $statusLabel = $status;
                  break;
          }
        @endphp

        @if($vehicle)
        <a href="{{ url('/auction-finder/vehicle/'.$vehicle->id) }}" 
           class="recent-view-item" 
           style="display:flex;align-items:center;justify-content:space-between;gap:1rem;padding:0.75rem 1rem;border-radius:0.75rem;background:#12151f;box-shadow:0 4px 15px rgba(0,0,0,0.3);transition:transform 0.2s;text-decoration:none; {{ $index >= 3 ? 'display:none;' : '' }}">
          
          <div style="display:flex;align-items:center;gap:1rem;">
            <div style="width:72px;height:54px;border-radius:0.5rem;overflow:hidden;border:2px solid rgba(56,189,248,0.35);flex-shrink:0;">
              <img src="{{ asset($firstImage) }}" alt="{{ $vehicle->title ?? 'Vehicle' }}" style="width:100%;height:100%;object-fit:cover;" />
            </div>
            <div style="display:flex;flex-direction:column;gap:0.2rem;">
              <h5 style="margin:0;font-size:1rem;color:#e2e8f0;font-weight:600;line-height:1.2;">
                {{ $vehicle->make->name ?? 'N/A' }}  
              </h5>
              <p style="margin:0;font-size:0.85rem;color:#94a3b8;">{{ $vehicle->model->name ?? 'N/A' }} {{ $vehicle->vehicle_type->name ?? 'N/A' }}</p>
              @if($vehicle->year)
              <p style="margin:0;font-size:0.85rem;color:#94a3b8;">Year: {{ $vehicle->year }}</p>
              @endif
            </div>
          </div>

          <span style="padding:0.35rem 0.75rem;border-radius:999px;font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.03em;color:#0b1120;background:{{ $statusColor }};flex-shrink:0;">
            {{ $statusLabel }}
          </span>
        </a>
        @endif
      @endforeach
    </div>

    @if($recentViews->count() > 3)
      <button id="viewMoreBtn" style="margin-top:0.5rem;padding:0.5rem;text-align:center;border-radius:0.5rem;background:#3b82f6;color:#fff;font-weight:600;border:none;cursor:pointer;">
        View More
      </button>
    @endif
  </div>
</section>






    </div>
  </main>
</div>


<script>
  document.querySelectorAll('a').forEach(el => {
    el.addEventListener('mouseenter', () => el.style.transform = 'translateY(-3px)');
    el.addEventListener('mouseleave', () => el.style.transform = 'translateY(0)');
  });
</script>


<script>
  const viewMoreBtn = document.getElementById('viewMoreBtn');
  const items = document.querySelectorAll('.recent-view-item');
  let expanded = false;

  viewMoreBtn?.addEventListener('click', () => {
      if(!expanded){
          items.forEach((el, index) => {
              if(index >= 3){
                  el.style.display = 'flex';
              }
          });
          viewMoreBtn.textContent = 'View Less';
          expanded = true;
      } else {
          items.forEach((el, index) => {
              if(index >= 3){
                  el.style.display = 'none';
              }
          });
          viewMoreBtn.textContent = 'View More';
          expanded = false;
      }
  });
</script>


<script>
  const viewMoreInterestBtn = document.getElementById('viewMoreInterestBtn');
  const interestItems = document.querySelectorAll('.interest-item');
  let interestExpanded = false;

  viewMoreInterestBtn?.addEventListener('click', () => {
      if(!interestExpanded){
          interestItems.forEach((el, index) => {
              if(index >= 4){
                  el.style.display = 'flex';
              }
          });
          viewMoreInterestBtn.textContent = 'View Less';
          interestExpanded = true;
      } else {
          interestItems.forEach((el, index) => {
              if(index >= 4){
                  el.style.display = 'none';
              }
          });
          viewMoreInterestBtn.textContent = 'View More';
          interestExpanded = false;
      }
  });
</script>
