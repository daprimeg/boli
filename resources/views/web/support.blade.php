@extends('web.partial.layout')

@section('css')
    <style>
        body {
            background: linear-gradient(135deg, #1a2332 0%, #2d3748 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #ffffff;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 119, 198, 0.05) 0%, transparent 50%);
            pointer-events: none;
        }

        .container-fluid {
            position: relative;
            z-index: 1;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 2px;
            color: #ffffff;
            text-decoration: none;
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icons a {
            color: #8892b0;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #ffffff;
        }

        .main-title {
            font-size: 3.5rem;
            font-weight: 300;
            line-height: 1.2;
            margin-bottom: 2rem;
            color: #ffffff;
        }

        .form-section {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            padding: 2rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .form-label {
            color: #8892b0;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 4px;
            color: #ffffff;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #4299e1;
            box-shadow: 0 0 0 0.2rem rgba(66, 153, 225, 0.25);
            color: #ffffff;
        }

        .form-control::placeholder {
            color: #8892b0;
        }

        .btn-primary {
            background: #4299e1;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #3182ce;
            transform: translateY(-1px);
        }

        .btn-outline-secondary {
            border: 1px solid #8892b0;
            color: #8892b0;
            padding: 0.75rem 2rem;
            border-radius: 4px;
            background: transparent;
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #ffffff;
            color: #ffffff;
        }

        .faq-section {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            padding: 2rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .faq-item {
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 4px;
            margin-bottom: 1rem;
            background: rgba(255, 255, 255, 0.05);
        }

        .faq-header {
            padding: 1rem 1.5rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        .faq-header:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .faq-header.active {
            background: rgba(66, 153, 225, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .faq-content {
            padding: 1.5rem;
            color: #8892b0;
            line-height: 1.6;
            display: none;
        }

        .faq-content.show {
            display: block;
        }

        .faq-icon {
            transition: transform 0.3s ease;
        }

        .faq-header.active .faq-icon {
            transform: rotate(45deg);
        }

        .learn-more-link {
            color: #4299e1;
            text-decoration: none;
        }

        .learn-more-link:hover {
            color: #63b3ed;
            text-decoration: underline;
        }

        .help-text {
            color: #8892b0;
            font-size: 0.9rem;
            margin-top: 1rem;
        }

        .help-text a {
            color: #4299e1;
            text-decoration: none;
        }

        .help-text a:hover {
            text-decoration: underline;
        }
        .faq-icon-top-left {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 1.5rem;
}

.faq-icon-top-left i {
    color: #ffffff;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 8px;
    padding: 10px;
}

        @media (max-width: 768px) {
            .main-title {
                font-size: 2.5rem;
            }
            
            .form-section, .faq-section {
                padding: 1.5rem;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
    

        <!-- Main Content -->
        <div class="row min-vh-100">
            <!-- Left Side - Contact Form -->
            <div class="col-lg-6 d-flex align-items-center">
                <div class="w-100 px-4">
                    <h1 class="main-title">
                        You haven't<br>
                        written in ages.
                    </h1>
                    
                    <div class="form-section">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" value="John Doe">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="john@example.com">
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Question*</label>
                                <textarea class="form-control" rows="4" placeholder="I have a question about my subscription..."></textarea>
                            </div>
                            
                            <div class="d-flex gap-3 mb-3">
                                <button type="submit" class="btn btn-primary">Send</button>
                                <button type="button" class="btn btn-outline-secondary">Return Home</button>
                            </div>
                            
                            <div class="help-text">
                                Hey! If you have a code-related question, please instead <a href="#">use the forum</a>.
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Side - FAQ -->
    <div class="col-lg-6 d-flex align-items-center">
    <div class="w-100 px-4">
        <div class="faq-section position-relative">
            <!-- Icon at Top Left -->
            <div class="faq-icon-top-left mb-3">
                <i class="fas fa-question-circle fa-2x text-white"></i>
            </div>

            <!-- Active FAQ Item -->
            <div class="faq-item">
                <div class="faq-header active" onclick="toggleFaq(this)">
                    <span>I'm interested in a lifetime account.</span>
                    <i class="fas fa-times faq-icon"></i>
                </div>
                <div class="faq-content show">
                    Of course you are! It's an incredible deal. Pay once, and access the entire Laracasts catalog (including all future content) FOREVER. Seriously. <a href="#" class="learn-more-link">Learn more here</a>.
                </div>
            </div>

            <!-- Other FAQ Items -->
            <div class="faq-item">
                <div class="faq-header" onclick="toggleFaq(this)">
                    <span>May I pay with Paypal?</span>
                    <i class="fas fa-plus faq-icon"></i>
                </div>
                <div class="faq-content">
                    Yes, PayPal is accepted for all subscription plans and lifetime accounts.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-header" onclick="toggleFaq(this)">
                    <span>I have a question about business/team accounts.</span>
                    <i class="fas fa-plus faq-icon"></i>
                </div>
                <div class="faq-content">
                    We offer special pricing for teams and businesses. Contact us for more information about bulk licensing.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-header" onclick="toggleFaq(this)">
                    <span>I have a code-related question.</span>
                    <i class="fas fa-plus faq-icon"></i>
                </div>
                <div class="faq-content">
                    For code-related questions, please use our community forum where you can get help from other developers.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-header" onclick="toggleFaq(this)">
                    <span>We're interested in advertising with you.</span>
                    <i class="fas fa-plus faq-icon"></i>
                </div>
                <div class="faq-content">
                    We'd love to hear from you! Please reach out with details about your advertising needs and budget.
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleFaq(element) {
            const faqItem = element.parentElement;
            const content = faqItem.querySelector('.faq-content');
            const icon = element.querySelector('.faq-icon');
            
            // Close all other FAQ items
            document.querySelectorAll('.faq-header').forEach(header => {
                if (header !== element) {
                    header.classList.remove('active');
                    header.parentElement.querySelector('.faq-content').classList.remove('show');
                    header.querySelector('.faq-icon').classList.remove('fa-times');
                    header.querySelector('.faq-icon').classList.add('fa-plus');
                }
            });
            
            // Toggle current FAQ item
            element.classList.toggle('active');
            content.classList.toggle('show');
            
            if (element.classList.contains('active')) {
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-plus');
            }
        }
    </script>
@endsection