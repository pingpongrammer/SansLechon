@extends('layout.affiliate-dashboard')
@section('content')
@include('components.alert-message')

<h1>Help Center</h1>
<section class=" grid sm:max-2xl:grid-cols-2 gap-4">
<div class="shadow-md shadow-[#d6987b] bg-white mb-10">
   <h1 class="text-center p-2 text-lg bg-[#A65B37] text-white">Frequently Asked Questions</h1>

        <div class="p-5 pb-1">
                <div class="flex text-md text-[#995333] font-bold">
                    <p class="mr-3">Q1:</p>
                    <h1>How does the commission rate work at Sans Lechon?</h1>
                </div>
                
                <div class="flex text-sm">
                    <p class="mr-6">A:</p>
                    <h3>At Sans Lechon, the commission rate is a flat 2% for all referrals. However, the actual commission amount you earn will vary depending on the price of the lechon ordered through your referrals.</h3>
                </div>
        </div>

            <div class="p-5 pb-1">
                <div class="flex text-md text-[#995333] font-bold">
                    <p class="mr-3">Q2:</p>
                    <h1>Can you explain how the 2% commission works with varying lechon prices?</h1>
                </div>
                
                <div class="flex text-sm">
                    <p class="mr-6">A:</p>
                    <h3>The 2% commission means that you will earn 2% of the total price of the lechon for each successful referral. So, if the price of the lechon is higher, your commission amount will also be higher, but the commission rate remains fixed at 2%.</h3>
                </div>
                
                </div>

                <div class="p-5 pb-1">
                    <div class="flex text-md text-[#995333] font-bold">
                        <p class="mr-3">Q3:</p>
                        <h1>Is there a limit to how much commission I can earn?</h1>
                    </div>
                    
                    <div class="flex text-sm">
                        <p class="mr-6">A:</p>
                        <h3>There is no maximum limit on the commission you can earn. Your commission amount is directly tied to the price of the lechon ordered through your referrals, so the more substantial the orders, the higher your earnings.</h3>
                    </div>
                    
                </div>

                <div class="p-5 pb-1">
                    <div class="flex text-md text-[#995333] font-bold">
                        <p class="mr-3">Q4:</p>
                        <h1>When and how will I receive my commission payments?</h1>
                    </div>
                    
                    <div class="flex text-sm">
                        <p class="mr-6">A:</p>
                        <h3>A: Commissions are typically paid out thru Bank Transfer. You can request payment at San's Lechon every 15th and 30th day in a month.</h3>
                    </div>
                    
                </div>

                <div class="p-5 pb-1">
                    <div class="flex text-md text-[#995333] font-bold">
                        <p class="mr-3">Q5:</p>
                        <h1>Do I have access to commission reports and tracking?</h1>
                    </div>
                    
                    <div class="flex text-sm">
                        <p class="mr-6">A:</p>
                        <h3>A: Yes, you can easily track your commission earnings, referral performance, and more through your Sans Lechon Business Dashboard.</h3>
                    </div>

                    <div class="mt-4 text-center text-sm text-[#925133]">
                        <h3>Have questions or need assistance? Contact our affiliate support team at sanslechon@gmail.com or 09776162392.</h3>
                    </div>
                    
                </div>
    </div>

    <div class="shadow-md shadow-[#d6987b] bg-white mb-10">
        <h1 class="text-center p-2 text-lg bg-[#A65B37] text-white">What's in the Dashboard?</h1>

        <div class="p-4 text-sm ">
            <h6>
                With this user-friendly interface, you can effortlessly track your performance and earnings. Here's what you'll find on your dashboard:
            </h6>
            <h4 class="mt-4"><span class="font-bold text-[#995333]">Commission Tracking:</span> Keep a close eye on your earnings with our commission tracking feature. We believe in transparency, so you can easily see how much commission you've earned from your referrals.</h4>
            <h4 class="mt-4"><span class="font-bold text-[#995333]">Total Orders:</span> Track every successful order through your referral links. See your impact and contribution to our success at Sans Lechon!</h4>
            <h4 class="mt-4"><span class="font-bold text-[#995333]">Referral Link Clicks:</span> Curious about how many people are clicking on your referral links? Our dashboard provides data on the total clicks your links have received. This metric helps you understand the engagement level of your audience.</h4>
            <h4 class="mt-4"><span class="font-bold text-[#995333]">Website View:</span> Monitor the number of user who visit and registered to your referral links, with each registration counting as one. This data empowers you to refine your marketing strategies for more successful referrals.</h4>
        </div>
        <div class="mt-4 text-center text-sm text-[#925133]">
            <h3>Have questions or need assistance? Contact our affiliate support team at sanslechon@gmail.com or 09776162392.</h3>
        </div>
    </div>
</section>



@endsection