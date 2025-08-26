@extends('layouts.masterlogin')

@section('title')
    تسجيل دخول - برنامج ادارة العيادات
@stop

@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Medical Care Management System — Login</title>

  <!-- Bootstrap 5 (اتركه هنا لو الـ layout لا يحمّل Bootstrap، لو عندك Bootstrap بالفعل في الماستر سيبّه برضه مش هيكسر حاجة) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <!-- Inter font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    :root{
      --brand:#0ea5e9;
      --brand-600:#0284c7;
      --brand-700:#0369a1;
      --mint:#22c55e;
      --warning:#f59e0b;
      --danger:#ef4444;
      --ink:#0f172a;
      --muted:#64748b;
      --bg:#eef7ff;
      --card:#ffffffcc;
      --glass:blur(14px);
      --radius:20px;
      --shadow:0 20px 60px rgba(2,132,199,.18);
    }

    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,"Apple Color Emoji","Segoe UI Emoji";
      color:var(--ink);
      background:linear-gradient(120deg,#e6f3ff 0%, #f7fbff 25%, #eaf4ff 60%, #f2fbff 100%);
      overflow-x:hidden;
    }

    /* Background waves */
    .bg-waves{
      position:fixed; inset:0; z-index:-2;
      background:
        radial-gradient(1200px 600px at -5% -10%, #a5f3fc33 0, transparent 60%),
        radial-gradient(900px 500px at 110% 10%, #93c5fd33 0, transparent 60%),
        radial-gradient(700px 600px at 20% 110%, #86efac33 0, transparent 60%);
      animation: floatBg 14s ease-in-out infinite alternate;
    }
    @keyframes floatBg{
      0%{ transform: translateY(0px) }
      100%{ transform: translateY(-18px) }
    }
    .wave{
      position:fixed; left:0; right:0; bottom:-2px; z-index:-1;
      animation: waveUp 6s ease-in-out infinite alternate;
    }
    @keyframes waveUp{
      from{ transform: translateY(0) }
      to{ transform: translateY(8px) }
    }

    /* Container */
    .auth-wrapper{
      min-height:100vh;
      display:grid;
      place-items:center;
      padding:24px;
    }

    /* Card */
    .auth-card{
      width:min(1200px, 96vw);
      background:var(--card);
      -webkit-backdrop-filter: var(--glass);
      backdrop-filter: var(--glass);
      border-radius:var(--radius);
      box-shadow:var(--shadow);
      overflow:hidden;
      border:1px solid #cfe8ff66;
    }

    .left-panel{
      padding:40px 40px 28px;
      background:linear-gradient(180deg,#ffffffcc 0%, #ffffffb5 100%);
    }

    .brand-badge{
      width:86px; height:86px; border-radius:50%;
      display:grid; place-items:center;
      background:linear-gradient(145deg,var(--brand),var(--brand-700));
      color:#fff; font-size:36px; margin:auto;
      box-shadow:0 12px 30px rgba(2,132,199,.35);
      position:relative;
      isolation:isolate;
      animation: popIn .7s cubic-bezier(.2,.8,.2,1);
    }
    @keyframes popIn{
      0%{ transform: scale(.8); opacity:0 }
      100%{ transform: scale(1); opacity:1 }
    }
    .brand-badge::after{
      content:"";
      position:absolute; inset:-10px; border-radius:inherit;
      background:conic-gradient(from 90deg at 50% 50%, #ffffff22 0 25%, transparent 0 50%, #ffffff15 0 75%, transparent 0);
      z-index:-1; filter:blur(8px);
    }

    .title{
      text-align:center; margin:16px 0 6px; font-weight:800; letter-spacing:.2px;
      color:var(--brand-700);
      animation: slideDown .6s ease;
    }
    .subtitle{ text-align:center; color:var(--muted); margin-bottom:22px; animation: fade .8s ease }
    @keyframes slideDown{ from{ opacity:0; transform: translateY(-10px) } to{ opacity:1; transform:none } }
    @keyframes fade{ from{ opacity:0 } to{ opacity:1 } }

    .floating-label{ position:relative; }
    .floating-label .form-control{
      padding:14px 14px 14px 44px;
      border-radius:14px;
      border:1.5px solid #dbeafe;
      background:#f8fbff;
      transition:.25s;
    }
    .floating-label .form-control:focus{
      border-color:var(--brand);
      box-shadow:0 0 0 .25rem rgba(14,165,233,.15);
      background:#fff;
    }
    .floating-label i{
      position:absolute; left:12px; top:50%; transform:translateY(-50%);
      color:#7aa7d6; font-size:18px;
    }
    .field-hint{font-size:.85rem; color:var(--muted); margin-top:6px}

    .password-meter{
      height:6px; background:#e2e8f0; border-radius:10px; overflow:hidden; margin-top:10px;
    }
    .password-meter .bar{
      height:100%; width:0%;
      transition:width .35s ease, background .35s ease;
    }

    .btn-primary-med{
      background:linear-gradient(90deg,var(--brand-600),var(--brand));
      border:none; color:#fff; font-weight:700;
      padding:12px 16px; border-radius:14px;
      box-shadow:0 10px 24px rgba(2,132,199,.25);
      transition:transform .15s ease, box-shadow .15s ease, filter .15s ease;
    }
    .btn-primary-med:hover{ transform:translateY(-2px); filter:brightness(1.03); box-shadow:0 14px 32px rgba(2,132,199,.32);}
    .btn-primary-med:disabled{ opacity:.75 }

    .social-btn{
      display:flex; align-items:center; gap:10px;
      padding:10px 14px; border-radius:12px; border:1px solid #e2e8f0; background:#fff;
      color:#0f172a; font-weight:600; text-decoration:none;
      transition:.2s; width:100%; justify-content:center;
    }
    .social-btn:hover{ transform:translateY(-2px); box-shadow:0 8px 22px rgba(2,132,199,.12);}

    .divider{
      display:flex; align-items:center; gap:12px; color:#94a3b8; font-weight:600; margin:18px 0;
    }
    .divider::before,.divider::after{ content:""; height:1px; background:#e2e8f0; flex:1;}

    /* Right panel (illustration) */
    .right-panel{
      position:relative;
      background:linear-gradient(140deg,#0ea5e9 0%, #22c55e 100%);
      color:#fff;
      padding:40px 36px;
      overflow:hidden;
    }
    .right-overlay{
      position:absolute; inset:0; opacity:.15; pointer-events:none;
      background:
        radial-gradient(800px 400px at 20% 10%, #fff 0, transparent 55%),
        radial-gradient(800px 400px at 80% 100%, #fff 0, transparent 55%);
      animation: pulse 6s ease-in-out infinite;
    }
    @keyframes pulse{ 0%,100%{ opacity:.12 } 50%{ opacity:.2 } }
    .illus{
      max-width:520px; width:100%;
      filter:drop-shadow(0 16px 40px rgba(0,0,0,.25));
      animation: floatImg 8s ease-in-out infinite;
    }
    @keyframes floatImg{
      0%{ transform: translateY(0) }
      50%{ transform: translateY(-10px) }
      100%{ transform: translateY(0) }
    }
    .feature{ display:flex; gap:10px; align-items:flex-start; margin:10px 0; }
    .feature i{ margin-top:4px; }

    /* Toast */
    .toast-med{
      position:fixed; top:24px; right:24px; z-index:1045;
      transform:translateX(140%); opacity:0; transition:.35s;
      color:#fff; padding:14px 16px; border-radius:12px; font-weight:700;
      box-shadow:0 14px 32px rgba(0,0,0,.18);
    }
    .toast-med.show{ transform:none; opacity:1;}
    .toast-success{ background:linear-gradient(90deg,#16a34a,#22c55e);}
    .toast-error{ background:linear-gradient(90deg,#dc2626,#ef4444);}

    /* Footer */
    footer{ color:#64748b; }

    /* Responsive */
    @media (max-width: 991px){
      .grid{ display:block }
      .right-panel{ display:none }
      .left-panel{ padding:30px 22px 24px }
    }
  </style>
</head>
<body>
  <div class="bg-waves"></div>

  <!-- Decorative SVG waves -->
  <svg class="wave" height="220" viewBox="0 0 1440 220" preserveAspectRatio="none" aria-hidden="true">
    <path fill="#c7ebff" fill-opacity=".45" d="M0,160 C180,200 360,120 540,120 C720,120 900,200 1080,200 C1260,200 1440,140 1440,140 L1440,220 L0,220 Z"></path>
    <path fill="#a6e1ff" fill-opacity=".35" d="M0,140 C220,220 420,80 640,120 C860,160 1060,220 1440,160 L1440,220 L0,220 Z"></path>
  </svg>

  <!-- Toast -->
  <div id="toast" class="toast-med" role="status" aria-live="polite"></div>

  <main class="auth-wrapper">
    <div class="auth-card">
      <div class="row g-0 grid">
        <!-- Left: Form -->
        <div class="col-lg-6 left-panel">
          <div class="brand-badge" aria-hidden="true">
            <i class="fa-solid fa-heart-pulse"></i>
          </div>
          <h2 class="title" >Medical Care Management</h2>
          <p class="subtitle">One secure platform for all your medical management needs</p>

          <!-- Laravel Login Form -->
          <form id="loginForm" method="POST" action="{{ route('login') }}" novalidate>
            @csrf

            <!-- Email -->
            <div class="mb-3 floating-label">
              <i class="fa-regular fa-envelope"></i>
              <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email"
                placeholder="you@hospital.com"
                value="{{ old('email') }}"
                required
                autocomplete="email"
                autofocus
              >
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @else
                <div class="invalid-feedback">Please enter a valid email address</div>
              @enderror
            </div>

            <!-- Password -->
            <div class="mb-2 floating-label">
              <i class="fa-solid fa-lock"></i>
              <input
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                id="password"
                name="password"
                placeholder="••••••••"
                required
                minlength="6"
                aria-describedby="pwHelp"
                autocomplete="current-password"
              >
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Strength -->
            <div class="password-meter" aria-hidden="true">
              <div id="pwBar" class="bar"></div>
            </div>
            <div id="pwHelp" class="field-hint">Use at least 8 chars with upper, number, and symbol.</div>

            <!-- Options -->
            <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Remember me</label>
              </div>
              <button class="btn btn-link p-0 fw-semibold text-decoration-none" id="togglePass" type="button">
                <i class="fa-regular fa-eye me-1"></i> Show
              </button>
            </div>

            <!-- Submit -->
            <button id="loginBtn" class="btn btn-primary-med w-100" type="submit">
              <span class="spinner-border spinner-border-sm me-2 d-none" id="spinner" role="status" aria-hidden="true"></span>
              Sign In
            </button>

            <!-- Divider -->
            <div class="divider"><span>or continue with</span></div>

          
            <!-- Create / Contact -->
            <p class="mt-3 text-center text-muted">
              Don’t have an account?
              <a href="#" class="fw-semibold" style="color:var(--brand-700)">Contact Administration</a>
            </p>
          </form>

          <footer class="text-center mt-2">
            © <script>document.write(new Date().getFullYear())</script> Link
          </footer>
        </div>

        <!-- Right: Illustration / Selling points -->
        <div class="col-lg-6 right-panel">
          <div class="right-overlay"></div>

          <div class="d-flex align-items-start justify-content-between flex-wrap">
            <div class="pe-lg-3">
              <h2 class="fw-bold mb-2" style="color: #fff !important">Comprehensive Medical Suite</h2>
              <p class="mb-4 opacity-75">Streamline your operations with a secure, analytics-ready platform.</p>

              <div class="feature">
                <i class="fa-solid fa-circle-check"></i>
                <div>
                  <div class="fw-bold">Patient Records & Appointments</div>
                  <small class="opacity-75">Fast, accurate, and always compliant.</small>
                </div>
              </div>
              <div class="feature">
                <i class="fa-solid fa-circle-check"></i>
                <div>
                  <div class="fw-bold">Doctor & Clinic Management</div>
                  <small class="opacity-75">Scheduling, permissions, and metrics.</small>
                </div>
              </div>
              <div class="feature">
                <i class="fa-solid fa-circle-check"></i>
                <div>
                  <div class="fw-bold">Advanced Reports & Analytics</div>
                  <small class="opacity-75">Actionable insights in real time.</small>
                </div>
              </div>
              <div class="feature">
                <i class="fa-solid fa-circle-check"></i>
                <div>
                  <div class="fw-bold">e-Prescription & Integrations</div>
                  <small class="opacity-75">Standards-based and interoperable.</small>
                </div>
              </div>

              <div class="mt-4 d-flex align-items-center gap-3">
                <i class="fa-solid fa-headset fa-2x"></i>
                <div>
                  <div class="fw-bold">24/7 Support</div>
                  <small class="opacity-75">We’re always here to help</small>
                </div>
              </div>
            </div>

            <img class="illus mt-4 mt-lg-0"
                 alt="Medical Illustration"
                 src="https://images.unsplash.com/photo-1584515933487-779824d29309?q=80&w=1200&auto=format&fit=crop"/>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const email     = document.getElementById('email');
    const password  = document.getElementById('password');
    const loginBtn  = document.getElementById('loginBtn');
    const spinner   = document.getElementById('spinner');
    const toast     = document.getElementById('toast');
    const pwBar     = document.getElementById('pwBar');
    const toggleBtn = document.getElementById('togglePass');

    // Toggle password visibility
    toggleBtn.addEventListener('click', () => {
      const show = password.type === 'password';
      password.type = show ? 'text' : 'password';
      toggleBtn.innerHTML = show
        ? '<i class="fa-regular fa-eye-slash me-1"></i> Hide'
        : '<i class="fa-regular fa-eye me-1"></i> Show';
      password.focus();
    });

    // Password strength
    password.addEventListener('input', () => {
      const v = password.value;
      let score = 0;
      if (v.length >= 8) score += 25;
      if (/[A-Z]/.test(v)) score += 25;
      if (/[0-9]/.test(v)) score += 25;
      if (/[^A-Za-z0-9]/.test(v)) score += 25;

      pwBar.style.width = score + '%';
      pwBar.style.background =
        score < 50 ? '#ef4444' :
        score < 75 ? '#f59e0b' : '#22c55e';
    });

    // Simple toast
    function showToast(message, type='success'){
      toast.textContent = message;
      toast.className = 'toast-med ' + (type === 'success' ? 'toast-success' : 'toast-error') + ' show';
      setTimeout(()=> toast.classList.remove('show'), 2800);
    }

    // Basic client-side validation (لا يتعارض مع فاليديشن لارافيل)
    function isValidEmail(v){ return /^\S+@\S+\.\S+$/.test(v); }

    document.getElementById('loginForm').addEventListener('submit', (e)=>{
      // لو عايز تعتمد على السيرفر فقط، احذف الـ preventDefault
      // هنا هنسيب الفورم يكمّل إرسال الطلب للروت العادي
      if (!isValidEmail(email.value) || password.value.length < 6){
        e.preventDefault();
        if (!isValidEmail(email.value)) email.classList.add('is-invalid');
        if (password.value.length < 6)  password.classList.add('is-invalid');
        showToast('Please fix the errors in the form', 'error');
        return;
      }

      // تأثير بسيط أثناء الإرسال
      spinner.classList.remove('d-none');
      loginBtn.disabled = true;
      setTimeout(()=>{ /* يفضّل تسيبه فاضي لأن الري دايركت من السيرفر */ }, 800);
    });

    // إزالة الحالة عند الكتابة
    email.addEventListener('input', ()=> email.classList.remove('is-invalid'));
    password.addEventListener('input', ()=> password.classList.remove('is-invalid'));
  </script>
</body>
</html>

@endsection
