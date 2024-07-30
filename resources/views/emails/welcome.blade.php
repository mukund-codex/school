<p>
    Dear {{ $data['first_name'] }} {{ $data['last_name'] }},
</p>

<p>
    Administrator of {{ config('app.name') }} has created an account for you as a {{ ucfirst($data['role']) }}.
    <br>
    Below are your login credentials: <br>
    <a href="http://ec2-13-50-101-247.eu-north-1.compute.amazonaws.com"> Login Link</a> <br>
    Username/ Email: {{ $data['email'] }} <br>
    Password: {{ $data['raw_password'] }} <br>
    <br><br>
    Please change your password after logging in.
</p>
