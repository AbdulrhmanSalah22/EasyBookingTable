import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Observable, Subject } from 'rxjs';
import { User } from '../model/user';
import { OrderService } from './order.service';

@Injectable({
  providedIn: 'root',
})
export class UserService {
  loginErrors = new Subject<any>();
  Auth = new Subject<boolean>();
  getUser() {}

  addUser(user: any) {
    console.log(user);

    return this.Http.post<User>(
      'http://localhost:8000/api/user/register',
      user
    ).subscribe(
      (ResData) => {
        console.log(ResData);
        localStorage.setItem('toke', ResData.token);
        this.autoLogin();
        this.router.navigate(['/home']);
      },
      (error) => {
        console.log(error);
      }
    );
  }

  login(data: User) {
    this.Http.post<User>(
      'http://127.0.0.1:8000/api/user/login',
      data
    ).subscribe(
      (ResData) => {
        if (ResData.token) {
          localStorage.setItem('toke', ResData.token);
          this.autoLogin();
          this.router.navigate(['/home']);
        } else {
          this.loginErrors.next(ResData);
        }
      },
      (error) => {
        console.log(error);
      }
    );
  }
  logOut() {
    const headers = new HttpHeaders({
      Authorization: localStorage.getItem('toke')??""
    })
    this.Http.post<User>(
      'http://127.0.0.1:8000/api/user/logout',"log",{headers}).subscribe(
        data=>{
          console.log(data)
        }
      )
    localStorage.removeItem('toke');
    this.Auth.next(false);
  }
  autoLogin() {
    if (localStorage.getItem('toke')) {
      this.Auth.next(true);
    } else {
      this.Auth.next(false);
    }
  }
  constructor(
    private Http: HttpClient,
    private OrderService: OrderService,
    private router: Router
  ) {}
}
