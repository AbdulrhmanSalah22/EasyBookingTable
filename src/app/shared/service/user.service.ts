import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Login } from '../model/login';
import { User } from '../model/user';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  getUser(){

  }

  addUser(user:User):Observable<User>{
    console.log(user)
  return  this.Http.post<User>('http://127.0.0.1:8000/api/register',user)
  }
login(data:Login):Observable<Login>{
  return this.Http.post<Login>('http://127.0.0.1:8000/api/login',data)
}
  constructor(private Http:HttpClient) { }
}
