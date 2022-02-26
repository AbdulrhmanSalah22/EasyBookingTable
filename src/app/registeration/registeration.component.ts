import { Component, OnInit, ViewChild } from '@angular/core';
import { NgForm } from '@angular/forms';
import { User } from '../shared/model/user';
import { UserService } from '../shared/service/user.service';

@Component({
  selector: 'app-registeration',
  templateUrl: './registeration.component.html',
  styleUrls: ['./registeration.component.css']
})
export class RegisterationComponent implements OnInit {
  @ViewChild('f') form!:NgForm
  user!:User
  constructor(private UserService:UserService) { }

  ngOnInit(): void {
  }
  register(){
this.user=this.form.value
this.UserService.addUser(this.user)
console.log(this.user)
  }

}
