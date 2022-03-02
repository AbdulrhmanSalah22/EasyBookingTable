import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { MealService } from '../shared/service/meal.service';
import { UserService } from '../shared/service/user.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css'],
})
export class LoginComponent implements OnInit {
  errors!:any
  constructor(
    private fb: FormBuilder,
    private lohin_ser: MealService,
    private router: Router,
    private UserService: UserService
  ) {}
  loginForm = this.fb.group({
    email: ['', [Validators.required, Validators.email]],
    password: ['', [Validators.required]],
  });
  ngOnInit(): void {
    this.UserService.loginErrors.subscribe(erros=>{
      console.log(erros)
      this.errors=erros
    })
  }
  onSubmit(signin: any) {
    this.UserService.login(signin.value);
  }
}
