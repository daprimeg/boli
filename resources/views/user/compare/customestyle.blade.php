<style>
   .dataTables_length{
      display:none!important;
   }

   .table{
    width: 100%!important;
   }

   .dataTables_info{
      /* display: inline!important; */
   }

   .datatables-products th {
      text-align: center;
   }
   .datatables-products td {
      text-align: center;
   }

   .table-responsive {
      overflow-x: auto!important;
      -webkit-overflow-scrolling: touch!important;
   }



.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 24px;
}

/* Slider Section */
.slider-section {
    margin-bottom: 32px;
}

.slider-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
}

.slider-header h2 {
    font-size: 20px;
    font-weight: 600;
}

.slider-controls {
    display: flex;
    gap: 8px;
}

.slider-btn {
    width: 40px;
    height: 40px;
    background-color: #1e293b;
    border: 1px solid #475569;
    color: white;
    border-radius: 6px;
    cursor: pointer;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.2s;
}

.slider-btn:hover {
    background-color: #334155;
}

.slider-container {
    overflow: hidden;
    border-radius: 8px;
}

.slider-wrapper {
    display: flex;
    gap: 16px;
    transition: transform 0.3s ease;
}

.vehicle-card {
    flex: 0 0 calc(25% - 12px);
    /* background-color: #1e293b; */
    /* border: 1px solid #475569; */
    border-radius: 8px;
    padding: 16px;
}

.card-image {
    position: relative;
    margin-bottom: 12px;
}

.card-image img {
    width: 100%;
    height: 96px;
    object-fit: cover;
    border-radius: 6px;
}

.plus-btn {
    position: absolute;
    top: 8px;
    right: -3px;
    width: 24px;
    height: 24px;
    background-color: #475569;
    border: none;
    color: white;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.plus-btn:hover {
    background-color: #64748b;
}

.card-content h3 {
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 8px;
    line-height: 1.3;
}

.badge {
    background-color: #2563eb;
    color: white;
    padding: 2px 8px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 500;
    display: inline-block;
    margin-bottom: 12px;
}

.card-actions {
    display: flex;
    gap: 8px;
}

.btn-report, .btn-view {
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
    border: 1px solid;
    transition: all 0.2s;
}

.btn-report {
    background-color: #2563eb;
    border-color: #2563eb;
    color: white;
}

.btn-report:hover {
    background-color: #1d4ed8;
}

.btn-view {
    background-color: transparent;
    border-color: #64748b;
    color: white;
}

.btn-view:hover {
    background-color: #1e293b;
}

/* Table Section */
.table-section {
    /* background-color: #1e293b; */
      /* border: 1px solid #475569; */
    border-radius: 8px;
    padding: 24px;
}

.table-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}

.left-controls {
    display: flex;
    align-items: center;
    gap: 16px;
}

.page-select {
    background-color: #334155;
    border: 1px solid #64748b;
    color: white;
    padding: 8px 12px;
    border-radius: 6px;
    min-width: 80px;
}

.page-info {
    color: #94a3b8;
}

.search-input {
    background-color: #334155;
    border: 1px solid #64748b;
    color: white;
    padding: 8px 12px;
    border-radius: 6px;
    width: 320px;
}

.search-input::placeholder {
    color: #94a3b8;
}

.table-container {
    overflow-x: auto;
}

.comparison-table {
    width: 100%;
    border-collapse: collapse;
}

.comparison-table th,
.comparison-table td {
    padding: 12px 16px;
    text-align: left;
    border-bottom: 1px solid #475569;
}

.row-header {
    width: 200px;
    background-color: transparent;
}

.vehicle-header {
    text-align: center;
    min-width: 150px;
    background-color: transparent;
}

.vehicle-info {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
}

.vehicle-name {
    font-size: 14px;
    font-weight: 500;
}

.row-label {
    font-weight: 500;
    color: #e2e8f0;
    background-color: transparent;
}

.cell-data {
    text-align: center;
    color: #94a3b8;
    background-color: transparent;
}

.comparison-table tr:hover {
    background-color: rgba(51, 65, 85, 0.3);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .vehicle-card {
        flex: 0 0 calc(33.333% - 11px);
    }
}

@media (max-width: 768px) {
    .vehicle-card {
        flex: 0 0 calc(50% - 8px);
    }
    
    .table-controls {
        flex-direction: column;
        gap: 16px;
        align-items: stretch;
    }
    
    .search-input {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .vehicle-card {
        flex: 0 0 100%;
    }
    
    .slider-controls {
        display: none;
    }
}


</style>


