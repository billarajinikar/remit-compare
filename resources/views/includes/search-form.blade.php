<style>
    .btn-orange {
        background-color: #ff8E00;
        color: white;
    }

    .btn-orange:hover {
        background-color: #e07b00;
        color: white;
    }

    .form-control, .form-select {
        border-radius: 0.375rem;
    }

    .form-label {
        font-size: 0.875rem;
    }
</style>

<div class="bg-white border rounded-3 p-4 shadow-sm mb-4">
    <form action="{{ route('remittance.search') }}" method="GET">
        <div class="row g-3 align-items-end">

            <!-- Spacer -->
            <div class="col-12 col-md-2 d-none d-md-block">&nbsp;</div>

            <!-- Amount + Currency -->
            <div class="col-12 col-md-4">
                <label for="amount" class="form-label fw-semibold text-uppercase text-muted">You Send</label>
                <div class="d-flex border border-2 rounded-3 overflow-hidden">
                    <input type="number" name="amount" id="amount" min="1" step="0" required
                        class="form-control border-0 py-3 px-3 fw-bold" placeholder="e.g. 1000" autofocus>
                    <span class="bg-light d-flex align-items-center gap-1 px-3 fw-bold text-primary border-start" aria-label="Swedish Krona">
                        <span style="line-height: 1;">🇸🇪</span><span>SEK</span>
                    </span>
                </div>
            </div>

            <!-- To Currency -->
            <div class="col-5 col-md-2">
                <label class="form-label fw-semibold text-uppercase text-muted">To</label>
                <div class="d-flex border border-2 rounded-3 py-2 w-60">
                    <select name="to_currency" class="fs-24 fw-bold border-0 w-100" required>
                        <option value="INR" selected>🇮🇳 INR</option>
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="col-4 col-md-2">
                <label class="form-label d-none d-md-block">&nbsp;</label>
                <button type="submit" class="btn btn-orange py-3 px-4 fw-semibold w-10 rounded-3">
                    🔍
                </button>
            </div>

            <!-- Spacer -->
            <div class="col-12 col-md-1 d-none d-md-block">&nbsp;</div>
        </div>
    </form>
</div>
