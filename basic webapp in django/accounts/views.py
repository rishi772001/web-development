from django.shortcuts import render,redirect
from django.contrib.auth.models import User,auth
from django.contrib import messages
# Create your views here.
def register(request):
    if request.method == 'POST':

        fname = request.POST['fname']
        lname = request.POST['lname']
        uname = request.POST['uname']
        email = request.POST['email']
        password = request.POST['pass']
        repassword = request.POST['repass']
        if(password == repassword):
            if User.objects.filter(username=uname).exists():
                messages.info(request,'Username Taken')
                return redirect('register')
            elif User.objects.filter(email=email).exists():
                messages.info(request, 'Email Taken')
                return redirect('register')
            else:
                user = User.objects.create_user(username=uname, password=password, email=email, first_name= fname, last_name=lname)
                user.save();
                return redirect('login')
        else:
            messages.info(request, 'Passwords does not match')
            return redirect('register')

    else:
        return render(request, 'mainapp/register.html')


def login(request):
    if request.method == 'POST':

        uname = request.POST['uname']
        password = request.POST['pass']

        user = auth.authenticate(username=uname, password=password)

        if user is not None:
            auth.login(request, user)
            print("logged in")
            return redirect("main")
        else:
            print("Not Logged In")
            messages.info(request, "Invalid credentials")
            return redirect("login")


    else:
        return render(request, 'mainapp/login.html')


def logout(request):
    auth.logout(request)
    print("logged out")
    return redirect('/')