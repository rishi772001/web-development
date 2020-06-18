from django.shortcuts import *
from django.shortcuts import HttpResponse
from .models import people
# Create your views here.
def home(request):
    return render(request, 'mainapp/index.html')


def main(request):
    if request.method == 'POST':
        name = request.POST['name']
        phno = request.POST['phone']
        email = request.POST['email']
        addr = request.POST['addr']

        p = people(name=name, phno=phno, email=email, addr=addr)
        p.save()
        print("done")
        return redirect("main")
    else:
        all_people = people.objects.all()
        context = {'all_people': all_people}
        return render(request, 'mainapp/main.html', context)